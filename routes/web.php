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
//商户账号审核
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {

    Route::get('audit/index',"UserController@index")->name('audit.index');
    Route::get('audit/start/{id}',"UserController@start")->name('audit.start');
    Route::get('audit/disable/{id}',"UserController@disable")->name('audit.disable');
});


//商户注册表
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {
    Route::get('user/reg',"UserController@reg");
    Route::get('user/index',"UserController@index")->name('user.index');
    Route::any('user/add',"UserController@add")->name('user.add');
    Route::any('user/edit/{id}',"UserController@edit")->name('user.edit');
    Route::get('user/del/{id}',"UserController@del")->name('user.del');
});

