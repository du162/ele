<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use App\Models\ShopCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends BaseController
{
    /**显示列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //获取菜品分类所有值
        $menuCates = MenuCategory::all();
        $search = $request->input('search');
        $max = $request->input('max');
        $min = $request->input('min');
        $cate = $request->input('cate');

        $query = Menu::orderBy('id');

        if ($search != null) {
            $query->where('goods_name', 'like', "%$search%")->orWhere('tips', 'like', "%$search%");
        }
        if ($max != null) {
            $query->where('goods_price', '>=', "$max");
        }
        if ($min != null) {
            $query->where('goods_price', '<=', "$min");
        }
        if ($cate != null) {
            $query->where('category_id', '=', "$cate");
        }
        //获取菜品所有值
        $menus = $query->get();
//        dd($menus);
        return view('shop.menu.index', compact('menus', 'menuCates'));
    }

    /**添加菜品
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request)
    {

        $menuCates = MenuCategory::all();

        if ($request->isMethod('post')) {
            $shop = Shop::where('id', '=', Auth::user()->shop_id)->first();
            $menu = $request->input();
            $menu['shop_id'] = $shop->id;
            Menu::create($menu);
            $request->session()->flash('success', '菜品添加成功');
            return redirect()->route('menu.index');
        }
        return view('shop.menu.add', compact('menuCates'));
    }

    /**修改菜品
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menuCates = MenuCategory::all();
        if ($request->isMethod('post')) {
            $menu->update($request->input());

            $request->session()->flash('success', '菜品修改成功');

            return redirect()->route('menu.index');
        }
        return view('shop.menu.edit', compact('menu', 'menuCates'));
    }

    /**删除菜品
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function del($id)
    {

        Menu::findOrFail($id)->delete();

        session()->flash('success', '菜品修改成功');

        return redirect()->route('menu.index');

    }
}
