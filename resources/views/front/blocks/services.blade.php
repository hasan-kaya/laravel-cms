<section class="service_section commonSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title red_color">{{$data->posts[0]->name}}</h4>
                <h2 class="sec_title white">{{$data->posts[0]->description}}</h2>
                <p class="sec_desc color_aaa">{!!strip_tags($data->posts[0]->content)!!}</p>
            </div>
        </div>
        <div class="row custom_column">
            @for ($i = 1; $i < count($data->posts); $i++)
                <div class="col-lg-3 col-sm-4 col-md-3">
                    <a href="{{get_url($data->posts[$i]->type->key, $data->posts[$i]->slug)}}" class="icon_box_1 text-center">
                        <div class="flipper">
                            <div class="front">
                                <i class="mei-web-design"></i>
                                <h3>{{$data->posts[$i]->name}}</h3>
                            </div>
                            <div class="back">
                                <i class="mei-web-design"></i>
                                <h3>{{$data->posts[$i]->description}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
</section>

{{--
    
<div class="col-lg-3 col-sm-4 col-md-3">
    <a href="service_detail.html" class="icon_box_1 text-center">
        <div class="flipper">
            <div class="front">
                <i class="mei-web-design"></i>
                <h3>Website Development</h3>
            </div>
            <div class="back">
                <i class="mei-web-design"></i>
                <h3>Website Development</h3>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <a href="service_detail.html" class="icon_box_1 text-center">
        <div class="flipper">
            <div class="front">
                <i class="mei-computer-graphic"></i>
                <h3>Graphic Designing</h3>
            </div>
            <div class="back">
                <i class="mei-computer-graphic"></i>
                <h3>Graphic Designing</h3>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <a href="service_detail.html" class="icon_box_1 text-center">
        <div class="flipper">
            <div class="front">
                <i class="mei-development-1"></i>
                <h3>Digital Marketing</h3>
            </div>
            <div class="back">
                <i class="mei-development-1"></i>
                <h3>Digital Marketing</h3>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <a href="service_detail.html" class="icon_box_1 text-center">
        <div class="flipper">
            <div class="front">
                <i class="mei-development"></i>
                <h3>SEo & Content Writing</h3>
            </div>
            <div class="back">
                <i class="mei-development"></i>
                <h3>SEo & Content Writing</h3>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-3 col-sm-4 col-md-3">
    <a href="service_detail.html" class="icon_box_1 text-center">
        <div class="flipper">
            <div class="front">
                <i class="mei-app-development"></i>
                <h3>App Development</h3>
            </div>
            <div class="back">
                <i class="mei-app-development"></i>
                <h3>App Development</h3>
            </div>
        </div>
    </a>
</div>
</div>    
--}}