@extends("layouts.admin.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>超级管理用户</th>
            <th>超级管理电子邮箱</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>
                    <a href="{{route('admin.edit',$admin)}}" class="btn btn-info">编辑</a>
                    <a href="{{route('admin.del',$admin)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection