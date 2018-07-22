@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>商户用户名</th>
            <th>状态显示</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->status}}</td>
                <td>
                    编辑
                    删除
                </td>
            </tr>
        @endforeach
    </table>
@endsection