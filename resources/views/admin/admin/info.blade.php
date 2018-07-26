@extends("layouts.admin.default")
@section("title","商户列表")
@section("content")
    <table class="table table-bordered table-hover">
        <tr>
            <td style="width: 20%">ID</td>
            <td>{{$admin->id}}</td>
        </tr>
        <tr>
            <td>用户名</td>
            <td>{{$admin->name}}</td>
        </tr>
        <tr>
            <td>注册时间</td>
            <td>{{$admin->created_at}}</td>
        </tr>
        <tr>
            <td>修改时间时间</td>
            <td>{{$admin->updated_at}}</td>
        </tr>
    </table>
@endsection