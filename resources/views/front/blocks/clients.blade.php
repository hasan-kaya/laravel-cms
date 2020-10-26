
<section class="commonSection client">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                {!!$block['content']!!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="client_slider">
                    @foreach ($data->posts as $item)
                    <div class="singleClient">
                        <a href="javascript:;">
                            <img src="{{asset($item->image)}}" alt="" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>