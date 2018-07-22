@extends("layouts.admin.default")
@section("title","商户类型")
@section("content")

    <form class="navbar-form navbar-right">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="请输入" style="width: 300px">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <a href="{{route('category.add')}}" class="btn btn-info">添加</a>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>商家分类名称</th>
            <th>商家图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shopcates as $shopcate)
            <tr>
                <td>{{$shopcate->id}}</td>
                <td>{{$shopcate->name}}</td>
                <td>{{$shopcate->logo}}</td>
                <td>@if ($shopcate->status===1)<i class="glyphicon glyphicon-ok"></i> @else <i class="glyphicon glyphicon-remove"></i>@endif</td>
                <td>
                    <a href="{{route('category.edit',$shopcate)}}" class="btn btn-success">编辑</a>
                    <a href="#" class="btn btn-danger"><i
                                class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{$books->links()}}--}}
@endsection