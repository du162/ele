@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <table class="table table-bordered table-hover">
        <tr>
            <td style="width: 20% ;text-align: right;padding-right: 40px">ID</td>
            <td>{{$act->id}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: right;padding-right: 40px">用户名</td>
            <td>{{$act->title}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: right;padding-right: 40px">活动详情</td>
            <td>{!!$act->content !!}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: right;padding-right: 40px">开始时间</td>
            <td>{{date('Y-m-d',$act->start_time)}}</td>
        </tr>
        <tr>
            <td style="width: 20% ;text-align: right;padding-right: 40px">结束时间</td>
            <td>{{date('Y-m-d',$act->end_time)}}</td>
        </tr>
    </table>
    <a href="{{route('activity.show')}}" class="btn btn-info">返回</a>
@endsection