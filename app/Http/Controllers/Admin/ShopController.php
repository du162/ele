<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\ShopCategories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //
    public function index(){

        $shops=Shop::all();


        return view('admin.shop.index',compact('shops'));
    }
    public function add(){
        $shopcates=ShopCategories::all();

        return view('admin.shop.add',compact('shopcates'));
    }

    public function edit(Request $request,$id){
        $shopcates=ShopCategories::all();
        $shop=Shop::find($id);
        if ($request->isMethod('post')) {

            $shop->update($request->input());
            $request->session()->flash('success','商户信息修改成功');

            return redirect()->route('shop.index');
        }
        return view('admin.shop.edit',compact('shopcates','shop'));
    }
    public function del(Request $request,$id){
        $shop=Shop::find($id);
        $shop->delete();
        $request->session()->flash('success','商户信息删除成功');
        return redirect()->route('shop.index');
    }

}
