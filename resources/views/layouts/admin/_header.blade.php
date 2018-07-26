<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
                 <li><a href="{{route('category.index')}}">商家分类<span class="sr-only">(current)</span></a></li>
                 <li><a href="{{route('shop.index')}}">商家管理<span class="sr-only">(current)</span></a></li>
                 <li><a href="{{route('audit.index')}}">商家审核<span class="sr-only">(current)</span></a></li>
                 <li><a href="{{route('admin.index')}}">超级管理员<span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('activity.index')}}">活动列表<span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">集合 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">商家分类管理 </a></li>
                        <li><a href="#"> 商家管理 </a></li>
                        <li><a href="#">商家审核</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @auth("admin")
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard("admin")->user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.info',\Illuminate\Support\Facades\Auth::guard("admin")->user()->id)}}">查看个人信息</a></li>
                            <li><a href="{{route('admin.current',\Illuminate\Support\Facades\Auth::guard("admin")->user()->id)}}">修改当前密码</a></li>
                            <li><a href="{{route('admin.reset')}}">重置当前密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('admin.logout')}}">退出</a></li>
                        </ul>
                    </li>
                @endauth
                @guest("admin")
                    <li><a href="{{route('admin.login')}}">登陆</a></li>
                    <li><a href="{{route('admin.reg')}}">注册</a></li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>