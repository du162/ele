@extends("layouts.admin.default")
@section("title","活动添加")
@section("content")
    <br><br>
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <b class="col-sm-2 control-label">活动名称</b>
            <div class="col-sm-8">
                <input type="text" name="title" value="{{old('name')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">活动详情</b>
            <div class="col-sm-8">
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>

                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain"></script>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">活动开始时间</b>
            <div class="col-sm-8">
                <input type="date" name="start_time" value="{{date('Y-m-d')}}" class="col-sm-9 form-control">
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">活动结束时间</b>
            <div class="col-sm-8">
                <input type="date" name="end_time" value="{{date('Y-m-d')}}" class="col-sm-9 form-control">
            </div>
        </div>
        <br>
        <div class="">
            <i class="col-sm-3"></i>
            <input type="submit" value="添加" class="btn btn-success">
            <i class="col-sm-1"></i>
            <input type="reset" value="返回" class="btn btn-danger">
        </div>
    </form>
@endsection