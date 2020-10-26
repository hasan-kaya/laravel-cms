 <header class="header_01" id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-3 col-md-3">
                <div class="logo">
                    <a href="{{ config('app.locale') == config('app.fallback_locale') ? url('/') : url('/'.config('app.locale')) }}">
                        <img src="{{ asset('storage/'.setting('logo')) }}" alt=""/>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-sm-7 col-md-7">
                <nav class="mainmenu text-center">
                    <ul>
                        @php
                        $main_menu = Menu::get('ana-menue');
                        @endphp
                        @foreach ($main_menu['items'] as $item)
                        <li class="{{ count($item['child']) > 0 ? "menu-item-has-children" : "" }}">
                            <a href="{{ count($item['child']) > 0 ? "javascript:void(0);" : $item['link'] }}">
                                {{ $item['label'] }}
                            </a>
                            @if( count($item['child']) > 0 )
                            <ul class="sub-menu">
                                @foreach ($item['child'] as $sub_item)
                                <li>
                                    <a href="{{ $sub_item['link'] }}">
                                        {{ $sub_item['label'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <div class="header-language">
                    <ul>
                        <li>
                            <a href="javascript:;">{{strtoupper(config('app.locale'))}}</a>
                            <ul>
                                @foreach( config('translatable.languages') as $code => $language )
                                @if($code != config('app.locale'))
                                <li><a href="{{url('/'.$code)}}">{{strtoupper($code)}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navigator text-right">
                    <a class="search searchToggler" href="javascript:void(0);"><i class="mei-magnifying-glass"></i></a>
                    <a href="javascript:void(0);" class="menu mobilemenu hidden-sm hidden-md hidden-lg hidden-xs"><i class="mei-menu"></i></a>
                    <a id="open-overlay-nav" class="menu hamburger" href="javascript:void(0);"><i class="mei-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="searchFixed popupBG">
    <div class="container-fluid">
        <a href="" id="sfCloser" class="sfCloser"></a>
        <div class="searchForms">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    <form method="get" action="{{url('/search')}}">
                        <input type="text" name="s" class="searchField" placeholder="{{trans('general.search_here')}}"/>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popup__menu">
    <a href="" id="close-popup" class="close-popup"></a>
    <div class="container mobileContainer">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="logo2">
                    <a href="index.html"><img src="{{asset('site/images/logo.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="popup-inner">
                    <div class="dl-menu__wrap dl-menuwrapper">
                        <ul class="dl-menu dl-menuopen">
                            @foreach ($main_menu['items'] as $item)
                            <li class="{{ count($item['child']) > 0 ? "menu-item-has-children" : "" }}">
                                <a href="{{ count($item['child']) > 0 ? "javascript:void(0);" : $item['link'] }}">
                                    {{ $item['label'] }}
                                </a>
                                @if( count($item['child']) > 0 )
                                <ul class="dl-submenu">
                                    @foreach ($item['child'] as $sub_item)
                                    <li>
                                        <a href="{{ $sub_item['link'] }}">
                                            {{ $sub_item['label'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12 text-left">
                <ul class="footer__contacts text-left">
                    <li>{{trans('contact.phone')}}: {{setting('phone')}}</li>
                    <li>{{trans('contact.email')}}: {{setting('email')}}</li>
                    <li>{{trans('contact.address')}}: {{setting('address')}}</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 col-xs-12">
                <div class="popUp_social text-right">
                    @php
                    $social_menu = Menu::get('sosyal-medya');
                    @endphp
                    <ul>
                        @foreach ($social_menu['items'] as $item)
                            <li>
                                <a href="{{$item['link']}}">
                                    <i class="fa fa-{{strtolower($item['label'])}}"></i>
                                    {{$item['label']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>