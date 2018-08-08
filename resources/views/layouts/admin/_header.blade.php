<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                @foreach(\App\Models\Nav::where('pid',0)->get() as $k1=>$v1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{$v1->name}}<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Nav::where('pid',$v1->id)->get() as $k2=>$v2)
                                {{--@if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->can($v2->url))--}}
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route($v2->url)}}">{{$v2->name}}</a></li>
                                {{--@endif--}}
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                    <li>
                        <a href="{{route('admin.nav.add')}}">添加目录</a>
                    </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @auth("admin")
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard("admin")->user()->name}}<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('admin.info',\Illuminate\Support\Facades\Auth::guard("admin")->user()->id)}}">查看个人信息</a>
                            </li>
                            <li>
                                <a href="{{route('admin.current',\Illuminate\Support\Facades\Auth::guard("admin")->user()->id)}}">修改当前密码</a>
                            </li>
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