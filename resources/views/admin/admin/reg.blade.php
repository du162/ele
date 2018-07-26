@extends("layouts.admin.default")
@section("title","超级root注册")
@section("content")
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <b class="col-sm-2 control-label">username</b>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{old('name')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <b class="col-sm-2 control-label">email</b>
            <div class="col-sm-8">
                <input type="email" name="email" value="{{old('email')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <b class="col-sm-2 control-label">password</b>
            <div class="col-sm-8">
                <input type="password" name="password" value="{{old('password')}}" class="col-sm-9 form-control"><br>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <b class="col-sm-2 control-label">验证码</b>
            <div class="col-sm-8">
                <input id="captcha" class="form-control" name="captcha" >
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码"><br>
            </div>
        </div>
        <div class="">
            <i class="col-sm-3"></i>
            <input type="submit" value="注册" class="col-sm-2 btn btn-success">
            <i class="col-sm-1"></i>
            <input type="reset" value="重置" class="col-sm-2 btn btn-danger">
        </div>
    </form>
@endsection