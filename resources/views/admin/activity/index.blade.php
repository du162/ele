@extends("layouts.admin.default")
@section("title","活动列表")
@section("content")
    {{--@if()--}}
        <a href="{{route('activity.add')}}" class="btn btn-info">添加</a>
        {{--@else--}}
        <a href="{{route('activity.index')}}" class="btn btn-info">全部</a>
    {{--@endif--}}
    <a href="{{route('activity.in','not')}}" class="btn btn-info">未开始活动</a>
    <a href="{{route('activity.in','for')}}" class="btn btn-info">活动进行中</a>
    <a href="{{route('activity.in','end')}}" class="btn btn-info">活动结束</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->title}}</td>
                <td style="width: 55%">{!! $activity->content!!}</td>
                <td>{{date('Y-m-d',$activity->start_time)}}</td>
                <td>{{date('Y-m-d',$activity->end_time)}}</td>
                <td>
                    <a href="{{route('activity.edit',$activity)}}" class="btn btn-info">编辑</a>
                    <a href="{{route('activity.del',$activity)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection