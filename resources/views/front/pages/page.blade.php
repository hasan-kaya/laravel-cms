@extends('front.layout',[
'title' => $post->name,
'description' => $post->description,
'keywords' => $post->tags,
])

@section('content')

@include('front.partials.breadcrumb',[
'title' => $post->name,
'description' => $post->description,
])

<section class="commonSection service_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <div class="serviceArea">
                    {!! $post->content !!}
                </div>
                @if( count($post->images) > 0 )
                    <div class="row">
                        @foreach ($post->images as $image)
                        <div class="col-md-4">
                            <div class="gallery-item">
                                <a href="{{asset($image->url)}}" data-fancybox="images">
                                    <img src="{{asset($image->url)}}">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-4 col-sm-4 sidebar">
                <aside class="widget categories">
                    @php
                    $sidebar_menu = Menu::get('sidebar-menu');
                    @endphp
                    <h3 class="widget_title">{{ $sidebar_menu['name'] }}</h3>
                    <div class="meipaly_categorie_widget">
                        <ul>
                            @foreach ($sidebar_menu['items'] as $item)
                            <li>
                                <a href="{{$item['link']}}">
                                    {{$item['label']}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
                <aside class="widget categories">
                    <div class="meipaly_services_help">
                        <h4>{{trans('general.sidebar_contact1')}}</h4>
                        <p>{{trans('general.sidebar_contact2')}}</p>
                        <h2>{{trans('general.sidebar_contact3')}}</h2>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection