@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form action="" method="get">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:150px;">
                                <input type="text" name="search" class="form-control pull-right"
                                       placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="box-tools" style="margin-right: 165px;">
                            <div class="input-group input-group-sm">
                                <input name="max" class="form-control" style="width:50px;border-radius: 5px;" placeholder="最低">
                                <input name="min" class="form-control" style="width:50px;margin-left: 20px;border-radius: 5px;"
                                       placeholder="最高">
                            </div>
                        </div>
                        <div class="box-tools" style="margin-right: 300px;">
                            <div class="input-group input-group-sm">
                                <select name="cate" class="form-control input-group-sm" style="width:80px;">
                                    <option value="">全部类型</option>
                                    @foreach($menuCates as $menuCate)

                                        <option value="{{$menuCate->id}}">{{$menuCate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>菜品名称</th>
                            <th>评分</th>
                            <th>所属商家ID</th>
                            <th>所属分类菜品</th>
                            <th>价格</th>
                            <th>描述</th>
                            <th>月销量</th>
                            <th>评分数量</th>
                            <th>提示信息</th>
                            <th>满意度数量</th>
                            <th>满意度评分</th>
                            <th>商品图片</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->goods_name}}</td>
                                <td>{{$menu->rating}}</td>
                                <td>{{$menu->shop->shop_name}}</td>
                                <td>{{$menu->category->name}}</td>
                                <td>{{$menu->goods_price}}</td>
                                <td><textarea cols="0">{{$menu->description}}</textarea></td>
                                <td>{{$menu->month_sales}}</td>
                                <td>{{$menu->rating_count}}</td>
                                <td>{{$menu->tips}}</td>
                                <td>{{$menu->satisfy_count}}</td>
                                <td>{{$menu->satisfy_rate}}</td>
                                <td>{{$menu->goods_img}}</td>
                                <td>{{$menu->status}}</td>
                                <td>
                                    <a href="{{route('menu.edit',$menu)}}" class="btn btn-info">编辑</a>
                                    <a href="{{route('menu.del',$menu)}}" class="btn btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection