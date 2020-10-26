@extends('front.layout',[
'title' => trans('contact.title'),
'description' => trans('contact.description'),
])

@section('content')

@include('front.partials.breadcrumb',[
'title' => trans('contact.title'),
'description' => trans('contact.description'),
])

<section class="commonSection client_2" style="padding-bottom:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="singleClient_2">
                    <h3>{{trans('contact.address')}}</h3>
                    <p>{{setting('address')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="singleClient_2">
                    <h3>{{trans('contact.email')}}</h3>
                    <p>{{setting('email')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="singleClient_2">
                    <h3>{{trans('contact.phone')}}</h3>
                    <p>{{setting('phone')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="singleClient_2">
                    <h3>Whatsapp</h3>
                    <p>{{setting('whatsapp')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="commonSection ContactPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title">{{trans('contact.form_title')}}</h4>
                <h2 class="sec_title">{{trans('contact.form_subtitle')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-12 col-md-10 col-md-offset-1">
                <form id="contact-form" class="contactFrom">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 form-row">
                            <input class="input-form required" type="text" name="name" id="name" placeholder="{{trans('contact.form_name')}}">
                        </div>
                        <div class="col-lg-6 col-sm-6 form-row">
                            <input class="input-form required" type="email" name="email" id="email" placeholder="{{trans('contact.form_email')}}">
                        </div>
                        <div class="col-lg-6 col-sm-6 form-row">
                            <input class="input-form" type="text" name="phone" id="phone" placeholder="{{trans('contact.form_phone')}}">
                        </div>
                        <div class="col-lg-6 col-sm-6 form-row">
                            <input class="input-form required" type="text" name="subject" id="subject" placeholder="{{trans('contact.form_subject')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12 form-row">
                            <textarea class="input-form required" name="con_message" id="con_message" placeholder="{{trans('contact.form_message')}}"></textarea>
                        </div>
                    </div>
                    <button class="common_btn red_bg" type="submit" id="con_submit"><span>{{trans('contact.form_submit')}}</span></button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="gmapsection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 noPadding">
                <div class="gmap" id="gmap_2"></div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
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
                element.parents(" form-row").addClass("has-feedback");
                if (!element.next("i")[0]) {
                    $("<i class='fa fa-times form-control-feedback'></i>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                if (!$(element).next("i")[0]) {
                    $("<i class='fa fa-check form-control-feedback'></i>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(" form-row").addClass("has-error").removeClass("has-success");
                $(element).next("i").addClass("fa-times").removeClass("fa-check");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(" form-row").addClass("has-success").removeClass("has-error");
                $(element).next("i").addClass("fa-check").removeClass("fa-times");
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#contact-form').serializeArray();
                formData.push({ name: "type", value: "{{\App\Enums\FormType::Contact}}" });
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