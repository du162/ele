@extends("layouts.shop.default")
@section("title","活动列表")
@section("content")
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->title}}</td>
                <td>{{date('Y-m-d',$activity->start_time)}}</td>
                <td>{{date('Y-m-d',$activity->end_time)}}</td>
                <td>
                    <a href="{{route('activity.details',$activity)}}" class="btn btn-info">详情</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection