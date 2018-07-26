@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <table class="table table-bordered table-hover">
        <tr>
            <td style="width: 20% ;text-align: center">ID</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: center">用户名</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: center">状态</td>
            <td>@if($user->status) <i class="glyphicon glyphicon-ok"></i> @else <i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: center">注册时间</td>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: center">修改时间时间</td>
            <td>{{$user->updated_at}}</td>
        </tr>
    </table>
@endsection