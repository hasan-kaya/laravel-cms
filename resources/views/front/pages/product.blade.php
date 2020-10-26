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

<div class="inner-page__wrapper">
    <div class="container">
        <div class="row gutter-30 m-flexdirection">
            @include('front.partials.sidebar')
            <div class="col-article">
                <div class="inner-page__content">
                    <div class="product-detail">
                        <div class="row gutter">
                            <div class="col-lg-6">
                                <div class="product-detail-photo ">
                                    <a href="{{asset($post->image)}}" data-scale="3" data-fancybox="images">
                                        <img src="{{asset($post->thumbnail)}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="page-content__header">
                                    <h6 class="title">{{$post->name}}</h6>
                                </div>

                                <div class="product-detail-description">
                                    {{$post->description}}
                                </div>
                                <h5 class="page-content__heading small pb-0 mt-20px">{{trans('product.information_title')}}</h5>
                                <div class="button-wrapper mt-10px row">
                                    <div class="col-sm-6 mb-10px">
                                        <a href="https://api.whatsapp.com/send?phone={{setting('whatsapp')}}" target="blank"
                                            class="button block border">{{trans('product.via_whatsapp')}}</a>
                                    </div>
                                    <div class="col-sm-6 mb-10px">
                                        <a href="tel:{{setting('phone')}}" target="blank" class="button block border">{{trans('product.via_phone')}}</a>
                                    </div>
                                </div>
                                <h5 class="page-content__heading small pb-0 mt-10px">{{trans('product.buy_title')}}</h5>
                                <div class="button-wrapper mt-10px">
                                    <a href="javascript:void(0)" class="button button1 block onsiparisform">{{trans('product.buy_btn')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content__header">
                        <h5 class="page-content__heading small pb-0 mt-40px">{{trans('product.content_title')}}</h5>
                        <div class="page-content__description mt-20px">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="form-custom v1 form-common form-contact pos-relative mt-50px urun-onbasvuru-form">
                        <form id="contact-form">
                            <ul class="row">
                                <li class="col-md-6">
                                    <span class="icon"><i class="far fa-user"></i></span>
                                    <input type="text" name="name" id="name" placeholder="{{trans('contact.form_name')}}">
                                </li>
                                <li class="col-md-6">
                                    <span class="icon"><i class="far fa-envelope"></i></span>
                                    <input class="form--special" type="text" name="email" id="email"
                                        placeholder="{{trans('contact.form_email')}}" data-form-email>
                                </li>
                                <li class="col-md-6">
                                    <span class="icon"><i class="fas fa-phone"></i></span>
                                    <input class="form--special" type="text" name="phone" id="phone"
                                        placeholder="{{trans('contact.form_phone')}}" data-form-tel>
                                </li>
                                <li class="col-md-6">
                                    <span class="icon"><i class="far fa-bookmark"></i></span>
                                    <input type="text" name="subject" id="subject" placeholder="{{trans('contact.form_subject')}}">
                                </li>
                                <li class="col-12">
                                    <textarea name="message" id="message" placeholder="{{trans('contact.form_message')}}"></textarea>
                                </li>
                                <div class="send">
                                    <input type="submit" name="gonder" id="gonder" value="{{trans('general.submit')}}">
                                </div>
                            </ul>
                            <div class="app-loading style-1 form-loading"></div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        
        @if(count($related_products) > 0)
        <div class="products list mt-50px">
            <div class="page-content__heading small mb-10px">{{trans('product.related')}}</div>
            <div class="row list small gutter">
                @foreach ($related_products as $related_product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ get_url($related_product->type->key, $related_product->slug) }}" class="hizmet-card ">
                        <div class="hizmet-card-photo">
                            <img src="{{asset($related_product->thumbnail)}}">
                        </div>
                        <div class="hizmet-card-header">
                            <div class="hizmet-card-title">{{$related_product->name}}</div>
                        </div>
                        <div class="hizmet-card-body">
                            <p>{{$related_product->description}}</p>
                        </div>
                        <div class="hizmet-card-footer">
                            <div class="hizmet-card-button">
                                {{trans('general.read_more')}} <span><i class="fas fa-angle-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.parallax-line a').click(function (e) {
            e.preventDefault();
            $('#myModal').modal('show');
        });

        $("#contact-form").validate({
            rules: {
                name: "required",
                subject: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    custom_number: true,
                },
                message: "required",
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                element.parents("li").addClass("has-feedback");
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents("li").addClass("has-error").removeClass("has-success");
                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents("li").addClass("has-success").removeClass("has-error");
                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#contact-form').serializeArray();
                formData.push({ name: "type", value: "{{\App\Enums\FormType::Order}}" });
                $.ajax({
                    url: '{{route('contact.store')}}',
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: '{{trans('general.message_sent')}}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                });
            }

        });

    });
</script>
@endsection