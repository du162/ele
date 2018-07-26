<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuCategoryController extends BaseController
{
    //
    //菜品分类显示
    public function index(){
        $shop=Shop::where('id','=',Auth::user()->shop_id)->first();

        $menuCates=MenuCategory::where('shop_id',$shop->id)->get();

        return view('shop.menuCate.index',compact('menuCates'));
    }

    /**添加菜品分类
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request){
        $shop=Shop::where('id',User::find(Auth::user()->id)->shop_id)->first();
        if ($request->isMethod('post')) {

            if ($request->input('is_selected')){

                MenuCategory::where('is_selected',1)->update(['is_selected'=>0]);

            }
            MenuCategory::create($request->input());

            $request->session()->flash('success','菜品分类添加成功');

            return redirect()->route('menuCate.index');
        }
        return view('shop.menuCate.add',compact('shop'));
    }

    /**修改菜品分类
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request,$id){
        $menuCate=MenuCategory::find($id);
        if ($request->isMethod('post')) {

            $menuCate->update($request->input());

            $request->session()->flash('success','菜品分类修改成功');

            return redirect()->route('menuCate.index');
        }
        return view('shop.menuCate.edit',compact('menuCate'));
    }

    /**删除菜品分类
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function del(Request $request,$id){



        $menucate=MenuCategory::find($id);

        if (Menu::where('category_id',$id)->count()){

            return back()->with('info','有菜品在不能删除');
        }
        $menucate->delete();
        $request->session()->flash('success','没有菜品删除成功');

        return redirect()->route('menuCate.index');
    }

}
