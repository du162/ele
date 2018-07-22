<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //
    public function index(){

        $shopcates=ShopCategories::all();

        return view('admin.shop_category.index',compact('shopcates'));
    }
    public function add(Request $request){
        if ($request->isMethod('post')) {

            ShopCategories::create($request->post());

            $request->session()->flash('success','商品类型添加成功');

            return redirect()->route('category.index');

        }
        return view('admin.shop_category.add');
    }

    public function edit(Request $request,$id){
        $shopcate=ShopCategories::find($id);

        return view('admin.shop_category.edit',compact('shopcate'));

    }
    public function del(){


    }

}
