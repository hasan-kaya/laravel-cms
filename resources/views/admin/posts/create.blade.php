@extends('admin.layouts.master')
@section('content')


<div class="page-title mb-3">
    <div class="title_left">
        <h3>
            @if(isset($post))
            İçerik Düzenle
            @else
            Yeni İçerik Ekle
            @endif
        </h3>
    </div>
</div>

@if(isset($post))
{{ Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'patch']) }}
@else
{{ Form::open(['route' => 'admin.posts.store']) }}
@endif


<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{ Form::text('name', old('name'), ['class'=>'form-control','placeholder'=>'Başlık']) }}
                    @if($errors->has('name'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('name') }}
                    </em>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::select('type', \App\Enums\PostType::toSelectArray(), null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        
        <div class="x_panel mt-3">
            <div class="x_title">
                <h2>İçerik</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{ Form::textarea('content', null, ['class'=>'form-control', 'id'=>'editor']) }}
                <br />
                <div class="ln_solid"></div>
                <div class="form-group row mb-4">
                    <label class="control-label col-md-3 col-sm-3 ">Kısa Açıklama:</label>
                    <div class="col-md-9 col-sm-9 ">
                        {{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Etiketler:</label>
                    <div class="col-md-9 col-sm-9 ">
                        {{ Form::textarea('tags', null, ['class'=>'form-control', 'rows'=>3]) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel mt-3">
            <div class="x_title">
                <h2>Resim Galerisi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="needsclick dropzone" id="images-dropzone"></div>
                <input type="hidden" name="image-order" id="image-order">
            </div>
        </div>

    </div>
    <div class="col-md-3">

        <div class="widget widget_tally_box">
            <div class="x_panel ">
                <div class="x_title">
                    <h2>Kategoriler</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="category-selector">
                        @foreach ($categories as $category)
                        <li>
                            {{ Form::checkbox('category_ids[]', $category->id, null, ['class'=>'flat']) }}
                            {{ $category->name }}
                            <ul>
                                @foreach ($category->children_categories as $child_category)
                                @include('admin.posts.child-category', ['child_category' => $child_category])
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            @if(isset($post))
            <div class="col-md-6">
                <a class="btn btn-block btn-primary align-top" target="_blank" href="{{ get_url($post->type->key, $post->slug) }}">
                    <i class="fa fa-arrow-right"></i> Git
                </a>
            </div>
            @endif
            <div class="col-md-6">
                {{ Form::submit('Kaydet', ['class' => 'btn btn-block btn-danger']) }}
            </div>
        </div>

    </div>

</div>
{{ Form::close() }}

<style>
.dropzone .dz-preview .dz-image img {
    width: 100%;
    object-fit: cover;
    height: 100%;
    object-position: center center;
}
</style>

@endsection


@section('scripts')
{{--
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $("#images-dropzone").sortable({
        items: '.dz-preview',
        cursor: 'move',
        opacity: 0.5,
        containment: '#images-dropzone',
        distance: 20,
        tolerance: 'pointer',
        stop: function(ui, event){
            var jsonObj = [];
            $("#images-dropzone > .dz-preview").each(function() {
                jsonObj.push( $(this).find('img').attr('alt') );
            });
            $('#image-order').val( JSON.stringify(jsonObj) );
        }
    });
 
    $("#images-dropzone").disableSelection();
</script>
--}}
<script>
    $( document ).ready(function() {
        CKEDITOR.replace('editor', {
            allowedContent: true,
            filebrowserImageBrowseUrl: '{{route('unisharp.lfm.show')}}?type=Images',
            filebrowserBrowseUrl: '{{route('unisharp.lfm.show')}}?type=Files'
        });
    });

    var uploadedImagesMap = {}
    Dropzone.options.imagesDropzone = {
        url: '{{ route('admin.posts.store-media') }}',
        dictRemoveFile: 'Resmi Sil',
        dictDefaultMessage: 'Resimleri buraya sürükleyin veya tıklayın',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
            uploadedImagesMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedImagesMap[file.name]
            }
            $('form').find('input[name="images[]"][value="' + name + '"]').remove()
        },
        init: function () {
            @if(isset($post) && $post->images)
            var files = {!! json_encode($post->images) !!}
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.thumbnail)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
            }
            @endif
        }
    }
</script>
@endsection