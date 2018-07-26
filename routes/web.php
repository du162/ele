<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    //店铺分类
    Route::get('shop_category/reg',"ShopCategoryController@reg")->name('category.reg');
    Route::get('shop_category/index',"ShopCategoryController@index")->name('category.index');
    Route::any('shop_category/add',"ShopCategoryController@add")->name('category.add');
    Route::any('shop_category/edit/{id}',"ShopCategoryController@edit")->name('category.edit');
    Route::any('shop_category/del/{id}',"ShopCategoryController@del")->name('category.del');

});

//商户信息表
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('shop/index',"ShopController@index")->name('shop.index');
    Route::any('shop/add',"ShopController@add")->name('shop.add');
    Route::any('shop/edit/{id}',"ShopController@edit")->name('shop.edit');
    Route::get('shop/del/{id}',"ShopController@del")->name('shop.del');
});
//平台管理员
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('admin/index',"AdminController@index")->name('admin.index');
    Route::any('admin/reg',"AdminController@reg")->name('admin.reg');
    Route::any('admin/edit/{id}',"AdminController@edit")->name('admin.edit');
    Route::get('admin/del/{id}',"AdminController@del")->name('admin.del');
    Route::any('admin/login',"AdminController@login")->name('admin.login');
    Route::get('admin/logout',"AdminController@logout")->name('admin.logout');
    Route::get('admin/info/{id}',"AdminController@info")->name('admin.info');
    Route::any('admin/current/{id}',"AdminController@current")->name('admin.current');
    Route::get('admin/reset',"AdminController@reset")->name('admin.reset');

});
//商户账号审核
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {

    Route::get('audit/index',"UserController@index")->name('audit.index');
    Route::get('audit/start/{id}',"UserController@start")->name('audit.start');
    Route::get('audit/disable/{id}',"UserController@disable")->name('audit.disable');
});

//活动列表
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {

    Route::get('activity/index',"ActivityController@index")->name('activity.index');
    Route::any('activity/add',"ActivityController@add")->name('activity.add');
    Route::any('activity/edit/{id}',"ActivityController@edit")->name('activity.edit');
    Route::get('activity/del/{id}',"ActivityController@del")->name('activity.del');

    Route::get('activity/in/{id}',"ActivityController@in")->name('activity.in');

});


//商户注册表
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {
    Route::get('user/reg',"UserController@reg");
    Route::any('user/login',"UserController@login")->name('user.login');
    Route::get('user/logout',"UserController@logout")->name('user.logout');
    Route::get('user/index',"UserController@index")->name('user.index');
    Route::any('user/add',"UserController@add")->name('user.add');
    Route::any('user/edit/{id}',"UserController@edit")->name('user.edit');
    Route::get('user/del/{id}',"UserController@del")->name('user.del');
    //修改个人密码
    Route::any('user/move',"UserController@move")->name('user.move');
    //查看个人信息
    Route::get('user/info',"UserController@info")->name('user.info');
    //密码重置
    Route::get('user/reset',"UserController@reset")->name('user.reset');
});
//菜品分类
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {

    Route::get('menuCate/index',"MenuCategoryController@index")->name('menuCate.index');
    Route::any('menuCate/add',"MenuCategoryController@add")->name('menuCate.add');
    Route::any('menuCate/edit/{id}',"MenuCategoryController@edit")->name('menuCate.edit');
    Route::get('menuCate/del/{id}',"MenuCategoryController@del")->name('menuCate.del');

});
//菜品表
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {
    Route::get('menu/index',"MenuController@index")->name('menu.index');
    Route::any('menu/add',"MenuController@add")->name('menu.add');
    Route::any('menu/edit/{id}',"MenuController@edit")->name('menu.edit');
    Route::get('menu/del/{id}',"MenuController@del")->name('menu.del');



    //商户活动列表显示
    Route::get('activity/index',"ActivityController@index")->name('activity.show');
    Route::get('activity/details/{id}',"ActivityController@details")->name('activity.details');
});



