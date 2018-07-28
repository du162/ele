<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Exception\LogicException;
use Mrgoon\AliSms\AliSms;

class UserController extends BaseController
{
    //
    /**账户登陆
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {

            if (Auth::attempt(['name' => $request->post('name'), 'password' => $request->password,'status'=>1])) {

                $request->session()->flash('success', '商户登陆成功');

                return redirect()->route('user.index');

            } else {
                $request->session()->flash('danger', '商户登陆失败,请重新登陆');

                return redirect()->back()->withInput();
            }
        }

//        $config = [
//            'access_key' => 'LTAIZEmIuyEapocv',
//            'access_secret' => '4L2DWrcrtHRJK6nKkaO9juY3jQCTBZ',
//            'sign_name' => '杜航',
//        ];
//
//        $aliSms = new Mrgoon\AliSms\AliSms();
//
//        $response = $aliSms->sendSms('15723141329', 'SMS_140685113', ['code'=> '1234'], $config);
//        $aliSms = new AliSms();
//
//        $response = $aliSms->sendSms('15736392964', 'SMS_140685113', ['code'=> rand(100000,999999)]);
//
//        dd($response);

        return view('shop.user.login');
    }

    /**账户退出
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->flash('success', '商户退出成功');
        return redirect()->route('user.login');

    }

    /**个人账户查看
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info()
    {


        $user = User::find(Auth::user()->id);

        return view('shop.user.info', compact('user'));
    }

    /**账户修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function move(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->isMethod('post')) {


            if (!Hash::check($request->post('password'), $user->password)) {

                $request->session()->flash('info', '您旧密码错误，请重新输入');

                return redirect()->back()->withInput();
            }
//            dd($request->input());
            if ($request->input('new_password') !== $request->input('re_password')) {

                $request->session()->flash('info', '您的两次密码不一致，请重新输入');

                return redirect()->back()->withInput();
            }

            $user['password'] = bcrypt($request->input('new_password'));
            $user->save();
            $request->session()->flash('info', '恭喜你！密码修改成功');
            return redirect()->route('user.index');
        }
        return view('shop.user.move', compact('user'));
    }

    /**密码重置
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        //获取当前登陆ID 并把信息查询出来
        $user = User::find(Auth::user()->id);
        //默认密码为1111
        $user['password'] = bcrypt('1111');
        //执行
        $user->save();
        //提示
        $request->session()->flash('info', '密码重置成功');
        //返回路径
        return redirect()->route('user.index');

    }
    //登陆商户账户信息表
    public function index()
    {

        $user = User::find(Auth::user()->id);
        //
        $shop=Shop::where('id',$user->shop_id)->first();
        //
        return view('shop.user.index', compact('user','shop'));
    }

    /** 账户添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */

    public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            try {
                //事务开启
                DB::beginTransaction();
                $user = $request->post();
                $user['password'] = bcrypt($user['password']);
                $user['password'] = bcrypt($user['password']);
                $userid = User::create($user);
                if ($userid) {
                    $shop = $request->input();
                    $shop['shop_img'] = "";
                    $shopid = Shop::create($shop);
                    $user = User::find($userid->id);
                    $user['shop_id'] = $shopid->id;
                    $user->save();
                    DB::commit();
                    $request->session()->flash('info', '账户添加成功');
                    return redirect()->route('user.index');
                }
            } catch (LogicException $e) {

                DB::rollBack();

            }
        }
        $shopcates = ShopCategories::all();

        return view('shop.user.add', compact('shopcates'));
    }

    /**删除账号
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function del($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('danger', '账户删除成功');
        //返回路径
        return redirect()->route('user.index');

    }
}
