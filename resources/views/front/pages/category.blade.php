@extends('front.layout',[
'title' => $category->name,
'description' => $category->description,
])

@section('content')

@include('front.partials.breadcrumb',[
'title' => $category->name,
'description' => $category->description,
])

<section class="commonSection blogPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="latestBlogItem">
                            <div class="lbi_thumb">
                                <img src="{{asset($post->thumbnail)}}" alt="">
                            </div>
                            <div class="lbi_details">
                                <a href="#" class="lbid_date">{{$post->created_at->format('d M')}}</a>
                                <h2><a href="{{ get_url($post->type->key, $post->slug) }}">{{$post->name}}</a></h2>
                                <a class="learnM"
                                    href="{{ get_url($post->type->key, $post->slug) }}">{{trans('general.read_more')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 sidebar">
                <aside class="widget search-widget">
                    <form method="post" action="#" class="searchform">
                        <input type="search" placeholder="{{trans('general.search_here')}}" name="s" id="s">
                    </form>
                </aside>
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
            </div>
        </div>
    </div>
</section>

@endsection