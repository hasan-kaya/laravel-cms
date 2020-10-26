<script type="text/javascript">
PNotify.defaults.styling = 'bootstrap4';
PNotify.defaults.icons = 'fontawesome4';
</script>
@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
        PNotify.success({
            title: 'Başarılı!',
            text: '{{ session('success') }}',
            delay: 2000
        });
    });
</script>
@endif

@if (session('alert'))
<script type="text/javascript">
    $(document).ready(function(){
        PNotify.error({
            title: 'Hata!',
            text: '{{ session('alert') }}',
            delay: 2000
        });
    });
</script>
@endif