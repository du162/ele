@extends("layouts.shop.default")
@section("title","菜品分类添加")
@section("content")
    <br>
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <b class="col-sm-2 control-label">菜品名称</b>
            <div class="col-sm-8">
                <input type="text" name="goods_name" value="{{old('goods_name',$menu->goods_name)}}" class="col-sm-9 form-control">
            </div>
        </div>

        <div class="form-group">
            <b class="col-sm-2 control-label">评分</b>
            <div class="col-sm-8">
                <input type="text" name="rating" value="{{old('rating',$menu->rating)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">所属分类菜品</b>
            <div class="col-sm-8">
                <select name="category_id" class="col-sm-9 form-control">
                    @foreach($menuCates as $menuCate)
                        <option value="{{$menuCate->id}}"  @if($menuCate->id==$menu->category_id) selected @endif>{{$menuCate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">价格</b>
            <div class="col-sm-8">
                <input type="text" name="goods_price" value="{{old('goods_price',$menu->goods_price)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">描述</b>
            <div class="col-sm-8">
                <textarea name="description" value="{{old('description')}}" cols="100" rows="5">{{$menu->description}}</textarea><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">月销量</b>
            <div class="col-sm-8">
                <input type="text" name="month_sales" value="{{old('month_sales',$menu->month_sales)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">评分数量</b>
            <div class="col-sm-8">
                <input type="text" name="rating_count" value="{{old('rating_count',$menu->rating_count)}}"
                       class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">提示信息</b>
            <div class="col-sm-8">
                <input type="text" name="tips" value="{{old('tips',$menu->tips)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">满意度数量</b>
            <div class="col-sm-8">
                <input type="text" name="satisfy_count" value="{{old('satisfy_count',$menu->satisfy_count)}}"
                       class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">满意度评分</b>
            <div class="col-sm-8">
                <input type="text" name="satisfy_rate" value="{{old('satisfy_rate',$menu->satisfy_rate)}}"
                       class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">商品图片</b>
            <div class="col-sm-8">
                <input type="text" name="goods_img" value="{{old('goods_img',$menu->goods_img)}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <div class="form-group">
            <b class="col-sm-2 control-label">是否是默认分类</b>
            <div class="col-sm-8">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="status" value="1" checked>是 &nbsp;&nbsp;
                <input type="radio" name="status" value="0">否
                <br>
            </div>
        </div>
        <br>
        <div class="">
            <i class="col-sm-3"></i>
            <input type="submit" value="修改" class="btn btn-success">
            <i class="col-sm-1"></i>
            <input type="reset" value="返回" class="btn btn-danger">
        </div>
    </form>
@endsection