@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        @if(isset($block))
        Yerleşim Düzenle
        @else
        Yeni Yerleşim Ekle
        @endif
    </div>
    <div class="card-body">
        @if(isset($block))
        {{ Form::model($block, ['route' => ['admin.blocks.update', $block->id], 'method' => 'patch']) }}
        @else
        {{ Form::open(['route' => 'admin.blocks.store']) }}
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('model_name') ? 'has-error' : '' }}">
                    {{Form::label('model_name', 'Modül :')}}
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::select('model_name', $models, null, ['placeholder' => 'Seçiniz', 'class'=>'form-control']) }}
                            @if($errors->has('model_name'))
                            <em class="invalid-feedback d-block">
                                {{ $errors->first('model_name') }}
                            </em>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('model_id') ? 'has-error' : '' }}">
                    {{Form::label('model_id', 'Eleman :')}}
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::select('model_id', [], null, ['placeholder' => 'Seçiniz', 'class'=>'form-control']) }}
                            @if($errors->has('model_id'))
                            <em class="invalid-feedback d-block">
                                {{ $errors->first('model_id') }}
                            </em>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('type', 'Tür :')}}
                    {{ Form::select('type', \App\Enums\BlockType::toSelectArray(), null, ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{Form::label('content', 'İçerik :')}}
                    {{ Form::textarea('content', null, ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Kaydet', ['class' => 'btn btn-danger']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('scripts')
<link href="{{asset('admin/css/codemirror.css')}}" rel="stylesheet">
<style>
    .CodeMirror {
        border: 1px solid #ced4da;
    }

    .form-group {
        margin-bottom: 2em;
    }

    label {
        font-weight: 500;
    }

    .card-header {
        font-size: 16px;
        font-weight: 500;
    }
</style>
<script src="{{asset('admin/js/codemirror.js')}}"></script>
<script src="{{asset('admin/js/codemirror-xml.js')}}"></script>
<script>
    /*var te_html = document.getElementById("content");
    var editor = CodeMirror.fromTextArea(te_html, {
        mode: "text/html",
        htmlMode: true,
        lineNumbers: true,
        lineWrapping: true
    });

    CKEDITOR.replace('content', {
        allowedContent: true,
    });*/

    $(document).ready(function () {

        if( $("select[name=model_name]").val() != '' ){
            setTimeout(function(){ 
                $("select[name=model_name]").trigger('change'); 
            }, 100);

            @if(isset($block))
                setTimeout(function(){ 
                    $("select[name=model_id]").val({{$block->model_id}}); 
                }, 500);
            @endif
        }

        $("select[name=model_name]").change(function () {
            var model_name = $(this).val();
            jQuery.ajax({
                url: "{{ route('admin.get-model-rows') }}",
                data: {
                    model_name: model_name
                },
                method: 'post',
                success: function (result) {
                    var select_html = '';
                    $.each(result.items, function (key, val) {
                        select_html += '<option value="' + val.id + '">' + val.name + '</option>';
                    });
                    console.log(select_html);
                    $('select[name=model_id]').html(select_html);
                }
            });
        });

    });
</script>
@endsection