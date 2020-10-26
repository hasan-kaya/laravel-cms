<script src="{{asset('site/js/jquery.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/modernizr.custom.js')}}"></script>
<script src="{{asset('site/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('site/js/gmaps.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDTPlX-43R1TpcQUyWjFgiSfL_BiGxslZU"></script>
<script src="{{asset('site/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('site/js/jquery.themepunch.tools.min.js')}}"></script>
<!-- Rev slider Add on Start -->
<script src="{{asset('site/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('site/js/extensions/revolution.extension.video.min.js')}}"></script>
<!-- Rev slider Add on End -->
<script src="{{asset('site/js/dlmenu.js')}}"></script>
<script src="{{asset('site/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('site/js/mixer.js')}}"></script>
<script src="{{asset('site/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.js')}}"></script>
<script src="{{asset('site/js/slick.js')}}"></script>
<script src="{{asset('site/js/jquery.appear.js')}}"></script>
<script src="{{asset('site/js/theme.js')}}"></script>

<script>
    function get_search_results(term = "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ route('api.search-product') }}",
            data: {
                term: term
            },
            method: 'post',
            success: function (result) {
                $('#search-results').html(result.html);
            }
        });
    }

    $(document).ready(function () {
        get_search_results();
        $(".search-header input").on("change paste keyup", function () {
            var term = $(this).val();
            if (term.length >= 3) {
                get_search_results(term);
            }
        });

        $.validator.addMethod("custom_number", function (value, element) {
            return this.optional(element) || value === "NA" ||
                value.match(/^[0-9,\+-]+$/);
        }, "Telefon numaranızı doğru formatta yazınız.");

        $('.parallax-line a').click(function (e) {
            e.preventDefault();
            $('#myModal').modal('show');
        });

        $("#footer-form").validate({
            rules: {
                name: "required",
                phone: {
                    required: true,
                    custom_number: true,
                },
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
                var formData = $('#footer-form').serializeArray();
                formData.push({
                    name: "type",
                    value: "{{\App\Enums\FormType::Contact}}"
                });
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
@yield('scripts')