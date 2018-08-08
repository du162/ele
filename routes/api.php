<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::namespace('Api')->group(function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    //店家显示
    Route::get('shop/list', 'ShopController@list');
    Route::get('shop/index', 'ShopController@index');

    //手机验证码
    Route::get('member/sms', 'MemberController@sms');
    //用户组
    //用户注册
    Route::post('member/reg', 'MemberController@reg');
    //用户登陆
    Route::any('member/login', 'MemberController@login');
    //修改密码
    Route::any('member/change', 'MemberController@change');
    //忘记密码
    Route::any('member/forget', 'MemberController@forget');
    // 用户详情接口
    Route::any('member/detail', 'MemberController@detail');

    //收货地址
    Route::any('address/index', 'AddressController@index');
    Route::post('address/add', 'AddressController@add');
    //修改地址回显
    Route::get('address/edit', 'AddressController@edit');
    Route::any('address/update', 'AddressController@update');

    //购物车
    Route::post('cart/add', 'CartController@add');
    Route::any('cart/cart', 'CartController@cart');

    //生成订单
    Route::any('order/add', 'OrderController@add');
    Route::any('order/order', 'OrderController@order');
    Route::any('order/list', 'OrderController@list');
    Route::any('order/pay', 'OrderController@pay');
});
