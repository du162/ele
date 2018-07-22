@extends("layouts.admin.default")
@section("content")
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <b class="col-sm-2 control-label">商家分类名称</b>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{old('name',$shopcate->name)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <b class="col-sm-2 control-label">商家分类图片</b>
            <div class="col-sm-8">
                <input type="text" name="logo" value="{{old('logo',$shopcate->logo)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <b class="col-sm-2 control-label">状态</b>
            <div class="col-sm-8">
                <input type="radio" name="status" value="1" @if($shopcate->status===1) checked @endif > <i class="btn btn-info
glyphicon glyphicon-ok"></i>

                <input type="radio" name="status" value="0" @if($shopcate->status===0) checked @endif><i class="btn btn-info
glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="">
            <i class="col-sm-3"></i>
            <input type="submit" value="提交" class="col-sm-2 btn btn-success">
            <i class="col-sm-1"></i>
            <input type="reset" value="重置" class="col-sm-2 btn btn-danger">
        </div>
    </form>
@endsection
