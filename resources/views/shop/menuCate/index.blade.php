@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>菜品编号</th>
            <th>所属商家ID</th>
            <th>描述</th>
            <th>是否是默认分类</th>
            <th>操作</th>
        </tr>
        @foreach($menuCates as $menuCate)
            <tr>
                <td>{{$menuCate->id}}</td>
                <td>{{$menuCate->name}}</td>
                <td>{{$menuCate->type_accumulation}}</td>
                <td>{{$menuCate->shop_id}}</td>
                <td>{{$menuCate->description}}</td>
                <td>{{$menuCate->is_selected}}</td>
                <td>
                    <a href="{{route('menuCate.edit',$menuCate)}}" class="btn btn-info">编辑</a>
                    <a href="{{route('menuCate.del',$menuCate)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection