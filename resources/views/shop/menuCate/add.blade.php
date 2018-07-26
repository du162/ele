@extends("layouts.shop.default")
@section("title","菜品分类添加")
@section("content")
    <br><br>
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <b class="col-sm-2 control-label">菜品类型名称</b>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{old('name')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">菜品编号</b>
            <div class="col-sm-8">
                <input type="text" name="type_accumulation" value="{{old('type_accumulation')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">所属商家</b>
            <div class="col-sm-8">
                <select name="shop_id" class="col-sm-9 form-control">
                    <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">描述</b>
            <div class="col-sm-8">
                <textarea name="description" value="{{old('description')}}" cols="130" rows="10"></textarea><br>
            </div>
        </div>
        <br>
        <div class="form-group">
            <b class="col-sm-2 control-label">是否是默认分类</b>
            <div class="col-sm-8">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_selected" value="1" >是 &nbsp;&nbsp;
                <input type="radio" name="is_selected" value="0" checked>否
                <br>
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