<section class="commonSection blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!!$block['content']!!}
            </div>
        </div>
        <div class="row">
            @foreach ($data->posts as $item)
            <div class="col-lg-4 col-sm-6 col-md-4">
                <div class="latestBlogItem">
                    <div class="lbi_thumb">
                        <img src="{{asset($item->image)}}" alt="">
                    </div>
                    <div class="lbi_details">
                        <a href="#" class="lbid_date">{{$item->created_at->format('d M')}}</a>
                        <h2><a href="{{ get_url($item->type->key, $item->slug) }}">{{$item->name}}</a></h2>
                        <a class="learnM" href="{{get_url($item->type->key, $item->slug)}}">
                            {{trans('general.read_more')}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>