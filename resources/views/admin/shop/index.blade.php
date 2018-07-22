@extends("layouts.admin.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>店铺分类ID</th>
            <th>名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->id}}</td>
                <td>{{$shop->shop_category_id}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>{{$shop->shop_img}}</td>
                <td>{{$shop->shop_rating}}</td>
                <td>{{$shop->start_send}}</td>
                <td>{{$shop->send_cost}}</td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->discount}}</td>
                <td>{{$shop->status}}</td>
                <td>
                    <a href="{{route('shop.edit',$shop)}}" class="btn btn-info">编辑</a>
                    <a href="{{route('shop.del',$shop)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection