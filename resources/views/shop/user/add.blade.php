@extends("layouts.shop.default")
@section("title","商户注册")
@section("content")
    <div class="">
        <form action="" method="post" class="form-horizontal">
            {{csrf_field()}}
            <table class="table table-bordered">
                <tr>
                    <td style="text-align: right; width: 20%">注册用户名</td>
                    <td><input type="text" name="name" class="col-sm-5 form-control" placeholder="商家用户名">
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">邮箱</td>
                    <td><input type="email" name="email" class="col-sm-5 form-control" placeholder="邮箱">
                </tr>
                <tr>
                    <td style="text-align: right; width: 20% ">注册商家密码</td>
                    <td><input type="password" name="password" class="col-sm-5 form-control" placeholder="商家密码"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">店铺分类</td>
                    <td>
                        <select name="shop_category_id"  class="col-sm-5 form-control">
                            @foreach($shopcates as $shopcate)
                                <option value="{{$shopcate->id}}" >{{$shopcate->name}}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">店铺名称</td>
                    <td><input type="text" name="shop_name" class="col-sm-5 form-control" placeholder="名称"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">店铺评分</td>
                    <td><input type="text" name="shop_rating" class="col-sm-5 form-control"
                               placeholder="商家评分"><br><br></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否是品牌</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="brand" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="brand" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否准时送达</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="on_time" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="on_time" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否蜂鸟配送</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="fengniao" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="fengniao" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否保标记</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="bao" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="bao" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否票标记</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="piao" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="piao" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">是否准标记</td>
                    <td style="padding-left: 10%">
                        <input type="radio" name="zhun" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="zhun" value="0" checked>否
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">起送金额</td>
                    <td><input type="text" value="0.00" name="start_send" class="col-sm-5 form-control"
                               placeholder="起送金额"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">配送费</td>
                    <td><input type="text" value="0.00" name="send_cost" class="col-sm-5 form-control"
                               placeholder="配送费"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">店公告</td>
                    <td><input type="text" name="notice" class="col-sm-5 form-control" placeholder="店公告"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%">优惠信息</td>
                    <td><input type="text" name="discount" class="col-sm-5 form-control" placeholder="优惠信息"></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 20%"></td>
                    <td>
                        <input type="submit" value="提交" class="btn btn-info">
                        <input type="reset" value="重置" class="btn btn-warning"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection