<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //
    //API前端接口 商户查询
    public function list(Request $request)
    {
        $keyword=$request->input('keyword');

        $shops = Shop::where('status', 1)->where('shop_name','like',"%$keyword%")->get();

        foreach ($shops as $shop) {
            $shop->distance = rand(500, 1000);
            $shop->estimate_time = ceil($shop->distance / 60);
        }
        return $shops;
    }
    //商品详细
    public function index(Request $request)
    {

        $id = $request->input('id');

        $shop = Shop::findOrFail($id);
//        $shop->shop_img="";
        $shop->evaluate = [
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http://www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "不怎么好吃"
            ],
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http://www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 4.5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ],
        ];
        $menucates=MenuCategory::where('shop_id',$id)->get();

        foreach ($menucates as $menucate){

            $menucate->goods_list=Menu::where('category_id',$menucate->id)->get();

        }
        $shop->commodity=$menucates;

        return $shop;
    }
}
