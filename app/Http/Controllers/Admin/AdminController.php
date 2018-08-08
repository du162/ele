<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminController extends BaseController
{

    /** 管理员注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function reg(Request $request){

        if ($request->isMethod('post')) {
            //获取参数
            $admin=$request->input();
            //密码加密
            $admin['password']=bcrypt($admin['password']);

            $ad=Admin::create($admin);
            $ad->syncRoles($request->post('role'));

            $request->session()->flash('info','您的超级管理注册成功,请来个五星好评');

            return redirect()->route('admin.reg');

        }
        //得到所有权限
        $roles=Role::all();
        return view('admin.admin.reg',compact('roles'));
    }

    /**登陆后台管理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request){
        if ($request->isMethod('post')) {
            if(Auth::guard('admin')->attempt(['name'=>$request->post('name'),'password'=>$request->password])){
                $request->session()->flash('info','您的超级管理登陆成功');

                return redirect()->route('admin.index');

            }else{
                $request->session()->flash('info','您的超级管理登陆失败,请重新登陆');

                return redirect()->back()->withInput();
            }
        }
        return view('admin.admin.login');
    }

    /**退出登陆
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){

        Auth::logout();

        $request->session()->flash('info','您的超级管理退出成功');

        return redirect()->route('admin.login');
    }

    /**查看当前信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info($id){
        $admin=Admin::find($id);

        return view('admin.admin.info',compact('admin'));
    }

    public function current(Request $request,$id){
        $admin=Admin::find($id);

        if ($request->isMethod('post')) {


            if (!Hash::check($request->post('password'),$admin->password)) {

                $request->session()->flash('info','您旧密码错误，请重新输入');

                return redirect()->back()->withInput();
            }
//            dd($request->input());
            if ($request->input('new_password') !== $request->input('re_password')) {

                $request->session()->flash('info', '您的两次密码不一致，请重新输入');

                return redirect()->back()->withInput();
            }

            $admin['password']=bcrypt($request->input('new_password'));
            $admin->save();
            $request->session()->flash('info', '恭喜你！密码修改成功');
            return redirect()->route('admin.index');
        }
        return view('admin.admin.current',compact('admin'));
    }
    public function reset(Request $request)
    {
        //获取当前登陆ID 并把信息查询出来
        $admin =Admin::find(Auth::user()->id);

        //默认密码为1111
        $admin['password'] = bcrypt('1111');
        //执行
        $admin->save();
        //提示
        $request->session()->flash('info', '密码重置成功');
        //返回路径
        return redirect()->route('admin.index');

    }

    /**显示账号
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $admins=Admin::all();

        return view('admin.admin.index',compact('admins'));
    }

    /**修改账号
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request,$id){
        $admin=Admin::find($id);
        if ($request->isMethod('post')) {

            $admins=$request->post();

            $admins['password']=bcrypt($admins['password']);

            $admin->update($admins);

            $admin->syncRoles($request->post('role'));

            $request->session()->flash('info','您的超级管理修改成功');

            return redirect()->route('admin.index');
        }
        $roles=Role::all();
        return view('admin.admin.edit',compact('admin','roles'));
    }

    /**删除账号
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function del($id){
        $admin=Admin::findOrFail($id);
        $admin->delete();
        session()->flash('info','您的超级管理删除成功');
        return redirect()->route('admin.index');

    }

}
