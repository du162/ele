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
    return view('index');
});


//测试
//Route::get('/mail', function () {
//    $order = \App\Models\Order::find(17);
//    return new \App\Mail\OrderShipped($order);
//});




Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('shop_category/ss', "ShopCategoryController@ss");
    //店铺分类
    Route::get('shop_category/reg', "ShopCategoryController@reg")->name('category.reg');
    Route::get('shop_category/index', "ShopCategoryController@index")->name('category.index');
    Route::any('shop_category/add', "ShopCategoryController@add")->name('category.add');
    Route::any('shop_category/edit/{id}', "ShopCategoryController@edit")->name('category.edit');
    Route::any('shop_category/del/{id}', "ShopCategoryController@del")->name('category.del');

});

//商户信息表
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('shop/index', "ShopController@index")->name('shop.index');
    Route::any('shop/add', "ShopController@add")->name('shop.add');
    Route::any('shop/edit/{id}', "ShopController@edit")->name('shop.edit');
    Route::get('shop/del/{id}', "ShopController@del")->name('shop.del');
});
//平台管理员
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('admin/index', "AdminController@index")->name('admin.index');
    Route::any('admin/reg', "AdminController@reg")->name('admin.reg');
    Route::any('admin/edit/{id}', "AdminController@edit")->name('admin.edit');
    Route::get('admin/del/{id}', "AdminController@del")->name('admin.del');
    Route::any('admin/login', "AdminController@login")->name('admin.login');
    Route::get('admin/logout', "AdminController@logout")->name('admin.logout');
    Route::get('admin/info/{id}', "AdminController@info")->name('admin.info');
    Route::any('admin/current/{id}', "AdminController@current")->name('admin.current');
    Route::get('admin/reset', "AdminController@reset")->name('admin.reset');

});
//商户账号审核
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {

    Route::get('audit/index', "UserController@index")->name('audit.index');
    Route::get('audit/start/{id}', "UserController@start")->name('audit.start');
    Route::get('audit/disable/{id}', "UserController@disable")->name('audit.disable');
});


Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    //活动列表
    Route::get('activity/index', "ActivityController@index")->name('activity.index');
    Route::any('activity/add', "ActivityController@add")->name('activity.add');
    Route::any('activity/edit/{id}', "ActivityController@edit")->name('activity.edit');
    Route::get('activity/del/{id}', "ActivityController@del")->name('activity.del');

    Route::get('activity/in/{id}', "ActivityController@in")->name('activity.in');

    //会员管理
    Route::get('member/index', "MemberController@index")->name('member.index');
    Route::get('member/details/{id}', "MemberController@details")->name('member.details');
    Route::get('member/status/{id}', "MemberController@status")->name('member.status');
    Route::any('member/filling/{id}', "MemberController@filling")->name('member.filling');

    //订单管理
    Route::any('order/index', "OrderController@index")->name('admin.order.index');
    Route::any('order/goods', "OrderController@goods")->name('admin.order.goods');


    //权限管理
    Route::get('per/index', "PerController@index")->name('admin.per.index');
    Route::any('per/add', "PerController@add")->name('admin.per.add');
    Route::get('per/del/{id}', "PerController@del")->name('admin.per.del');

    //用户添加
    Route::get('role/index', "RoleController@index")->name('admin.role.index');
    Route::any('role/add', "RoleController@add")->name('admin.role.add');
    Route::any('role/edit/{id}', "RoleController@edit")->name('admin.role.edit');
    Route::get('role/del/{id}', "RoleController@del")->name('admin.role.del');

    //列表显示
    Route::any('nav/add', "NavController@add")->name('admin.nav.add');

    //抽奖活动表
    Route::get('event/index', "EventController@index")->name('admin.event.index');
    Route::any('event/add', "EventController@add")->name('admin.event.add');
    Route::any('event/edit/{id}', "EventController@edit")->name('admin.event.edit');
    Route::get('event/del/{id}', "EventController@del")->name('admin.event.del');
    Route::get('event/smoke/{id}', "EventController@smoke")->name('admin.event.smoke');
    //抽奖报名管理
    Route::get('event/apply/{id}', "EventController@apply")->name('admin.event.apply');

    //抽奖礼品
    Route::get('prize/index', "EventPrizeController@index")->name('admin.prize.index');
    Route::any('prize/add', "EventPrizeController@add")->name('admin.prize.add');
    Route::any('prize/edit/{id}', "EventPrizeController@edit")->name('admin.prize.edit');
    Route::get('prize/del/{id}', "EventPrizeController@del")->name('admin.prize.del');
});


//商户注册表
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {
    Route::get('user/reg', "UserController@reg");
    Route::any('user/login', "UserController@login")->name('user.login');
    Route::get('user/logout', "UserController@logout")->name('user.logout');
    Route::get('user/index', "UserController@index")->name('user.index');
    Route::any('user/add', "UserController@add")->name('user.add');
    Route::any('user/edit/{id}', "UserController@edit")->name('user.edit');
    Route::get('user/del/{id}', "UserController@del")->name('user.del');
    //修改个人密码
    Route::any('user/move', "UserController@move")->name('user.move');
    //查看个人信息
    Route::get('user/info', "UserController@info")->name('user.info');
    //密码重置
    Route::get('user/reset', "UserController@reset")->name('user.reset');
});
//菜品分类
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {

    Route::get('menuCate/index', "MenuCategoryController@index")->name('menuCate.index');
    Route::any('menuCate/add', "MenuCategoryController@add")->name('menuCate.add');
    Route::any('menuCate/edit/{id}', "MenuCategoryController@edit")->name('menuCate.edit');
    Route::get('menuCate/del/{id}', "MenuCategoryController@del")->name('menuCate.del');

});
//菜品表
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {
    Route::get('menu/index', "MenuController@index")->name('menu.index');
    Route::any('menu/add', "MenuController@add")->name('menu.add');
    Route::any('menu/edit/{id}', "MenuController@edit")->name('menu.edit');
    Route::get('menu/del/{id}', "MenuController@del")->name('menu.del');


    //商户活动列表显示
    Route::get('activity/index', "ActivityController@index")->name('activity.show');
    Route::get('activity/details/{id}', "ActivityController@details")->name('activity.details');


    //订单管理
    Route::get('order/index', "OrderController@index")->name('order.index');
    Route::any('order/details/{id}', "OrderController@details")->name('order.details');
    Route::any('order/send/{id}', "OrderController@send")->name('order.send');
    Route::any('order/cancel/{id}', "OrderController@cancel")->name('order.cancel');
    //订单量统计
    Route::any('order/sum', "OrderController@sum")->name('order.sum');
    //菜单量统计
    Route::any('order/goods', "OrderController@goods")->name('order.goods');

    //活动列表
    Route::get('event/index', "EventController@index")->name('shop.event.index');
    Route::any('event/sign/{id}', "EventController@sign")->name('shop.event.sign');
    Route::get('event/results/{id}', "EventController@results")->name('shop.event.results');

});



