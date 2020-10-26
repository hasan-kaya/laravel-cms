<section class="commonSection porfolio what_wedo">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!!$block->content!!}
            </div>
        </div>
        <div class="row">
            @foreach ($data->posts as $item)
            <div class="col-lg-4 col-sm-6 col-md-4">
                <div class="singlefolio">
                    <img src="{{asset($item->image)}}" alt="" />
                    <div class="folioHover">
                        <a class="cate" href="{{get_url($item->type->key, $item->slug)}}">{{$item->description}}</a>
                        <h4><a href="{{get_url($item->type->key, $item->slug)}}">{{$item->name}}</a></h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>