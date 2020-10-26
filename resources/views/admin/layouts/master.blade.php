<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
</head>

<body class="nav-md">
    <div class="loading d-none"></div>
    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @include('admin.partials.sidebar')
                </div>
            </div>

            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.change-password') }}"> Şifremi
                                        Değiştir</a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Çıkış Yap
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown language-selector open">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false" id="language-selector">
                                    {{ config('translatable.languages')[App::getLocale()] }}
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="language-selector">
                                    @foreach( config('translatable.languages') as $code => $language )
                                    @if( $code != App::getLocale())
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{route('admin.language.change',$code)}}">
                                            {{ $language }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="right_col" role="main">
                <div class="clearfix"></div>
                @yield('content')
            </div>


        </div>
    </div>
    @include('admin.partials.scripts')
    @yield('scripts')
    @include('admin.partials.alert')

</body>

</html>