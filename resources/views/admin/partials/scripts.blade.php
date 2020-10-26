<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/js/fastclick.js')}}"></script>
<script src="{{asset('admin/js/nprogress.js')}}"></script>
<script src="{{asset('admin/js/icheck.min.js')}}"></script>
<script src="{{asset('admin/js/skycons.js')}}"></script>
<script src="{{asset('admin/js/date.js')}}"></script>
<script src="{{asset('admin/js/moment.min.js')}}"></script>
<script src="{{asset('admin/js/daterangepicker.js')}}"></script>
<script src="{{asset('admin/js/pnotify.js')}}"></script>
<script src="{{asset('admin/js/pnotify.buttons.js')}}"></script>
<script src="{{asset('admin/js/dropzone.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script src="{{asset('admin/js/custom.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var model = $('#model').val();

        $('.change-status').on('ifChanged', function (e) {
            var content_id = $(this).data('id');
            var status = 0;
            if (this.checked) {
                status = 1;
            }
            jQuery.ajax({
                url: "{{ route('admin.change-status') }}",
                data: {
                    model: model,
                    id: content_id,
                    status: status
                },
                method: 'post',
                success: function (result) {
                    PNotify.success({
                        title: 'Başarılı!',
                        text: 'Durum Değiştirildi.',
                        delay: 2000
                    });
                }
            });
        });

        $(".change-rank").change(function () {
            var content_id = $(this).data('id');
            var content_rank = $(this).val();
            jQuery.ajax({
                url: "{{ route('admin.change-rank') }}",
                data: {
                    model: model,
                    id: content_id,
                    rank: content_rank
                },
                method: 'post',
                success: function (result) {
                    PNotify.success({
                        title: 'Başarılı!',
                        text: 'Durum Değiştirildi.',
                        delay: 2000
                    });
                }
            });
        });

        $('#clear-cache').click(function (e) {
            $('.loading').removeClass('d-none');
            e.preventDefault();
            jQuery.ajax({
                url: "{{ route('admin.clear-cache') }}",
                method: 'post',
                success: function (result) {
                    $('.loading').addClass('d-none');
                    PNotify.success({
                        title: 'Başarılı!',
                        text: 'Önbellek Temizlendi.',
                        delay: 2000
                    });
                }
            });
        });

    });
</script>