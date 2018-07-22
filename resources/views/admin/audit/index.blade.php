@extends("layouts.admin.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>商家用户</th>
            <th>商家电子邮箱</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->status===1)<i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
                <td>
                    <a href="{{route('audit.start',$user)}}" class="btn btn-info">启用</a>
                    <a href="{{route('audit.disable',$user)}}" class="btn btn-danger">禁用</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection