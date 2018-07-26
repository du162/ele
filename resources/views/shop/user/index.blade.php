@extends("layouts.shop.default")
@section("title","商户列表")
@section("content")
    <table class="table table-hover table-bordered">

        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">id</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">商家账号</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">电子邮箱</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">名称</td>
            <td>{{$shop->shop_name}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">店铺图片</td>
            <td>{{$shop->shop_img}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">评分</td>
            <td>{{$shop->shop_rating}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否是品牌</td>
            <td>@if($shop->brand) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否准时送达</td>
            <td>@if($shop->on_time) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否蜂鸟配送</td>
            <td>@if($shop->fengniao) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否保标记</td>
            <td>@if($shop->bao) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否票标记</td>
            <td>@if($shop->piao) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">是否准标记</td>
            <td>@if($shop->zhun) <i class="glyphicon glyphicon-ok"></i>@else<i class="glyphicon glyphicon-remove"></i> @endif</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">起送金额</td>
            <td>{{$shop->start_send}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">配送费</td>
            <td>{{$shop->send_cost}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">店公告</td>
            <td>{{$shop->notice}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">优惠信息</td>
            <td>{{$shop->discount}}</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align: right;padding-right: 30px">状态</td>
            <td>{{$shop->status}}</td>
        </tr>
    </table>
@endsection