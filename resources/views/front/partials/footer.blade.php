<footer class="footer_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6 col-md-5">
                <aside class="widget aboutwidget">
                    <a href="#"><img src="{{asset('site/images/foo_logo.png')}}" alt=""></a>
                    <p>{{trans('general.about_us')}}</p>
                </aside>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <aside class="widget contact_widgets">
                <h3 class="widget_title">{{trans('general.Contact')}}</h3>
                    <p>{{setting('address')}}</p>
                    <p>{{setting('phone')}}</p>
                    <p><a href="mailto:{{setting('email')}}">{{setting('email')}}</a></p>
                </aside>
            </div>
            <div class="col-lg-3 col-sm-2 col-md-3">
                <aside class="widget social_widget">
                    @php
                        $social_menu = Menu::get('sosyal-medya');
                    @endphp
                    <h3 class="widget_title">{{$social_menu['name']}}</h3>
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
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="copyright">
                    {{trans('general.copyright')}}
                </div>
            </div>
        </div>
    </div>
</footer>

<a id="backToTop" href="#" class=""><i class="fa fa-angle-double-up"></i></a>