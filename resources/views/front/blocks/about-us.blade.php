<section class="commonSection ab_agency">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 PR_79">
                <h4 class="sub_title">{{$data['name']}}</h4>
                <h2 class="sec_title MB_45">{{$data['description']}}</h2>
                <p class="sec_desc">
                    {!! excerpt($data['content']) !!}
                </p>
            <a class="common_btn red_bg" href="{{get_url($data->type->key, $data->slug)}}"><span>{{trans('general.read_more')}}</span></a>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                @foreach ($data->images as $image)
                <div class="ab_img{{$loop->iteration}}">
                    <img src="{{$image->thumbnail}}" alt=""/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>