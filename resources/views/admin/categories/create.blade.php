@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        @if(isset($category))
        Kategori Düzenle
        @else
        Yeni Kategori Ekle
        @endif
    </div>
    <div class="card-body">

        @if(isset($category))
        {{ Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'patch']) }}
        @else
        {{ Form::open(['route' => 'admin.categories.store']) }}
        @endif



        <div class="row">

            <div class="col-md-6">
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{Form::label('name', 'Başlık', ['class' => 'col-md-3 col-sm-3'])}}
                    <div class="col-md-9 col-sm-9">
                        {{ Form::text('name', old('name'), ['class'=>'form-control']) }}
                        @if($errors->has('name'))
                        <em class="invalid-feedback d-block">
                            {{ $errors->first('name') }}
                        </em>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('description', 'Kısa Açıklama', ['class' => 'col-md-3 col-sm-3'])}}
                    <div class="col-md-9 col-sm-9">
                        {{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('parent', 'Üst Kategori', ['class' => 'col-md-3 col-sm-3'])}}
                    <div class="col-md-9 col-sm-9">
                        <div class="widget widget_tally_box">
                            <div class="x_panel">
                                <div class="x_content">
                                    <ul class="category-selector">
                                        @foreach ($categories as $category2)
                                        <li>
                                            {{ Form::radio('category_id', $category2->id, null, ['class'=>'flat']) }}
                                            {{ $category2->name }}
                                            <ul>
                                                @foreach ($category2->children_categories as $child_category)
                                                @include('admin.categories.child-category', ['child_category' =>
                                                $child_category])
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if($errors->has('category_id'))
                                <em class="invalid-feedback d-block">
                                    {{ $errors->first('category_id') }}
                                </em>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{ Form::submit('Kaydet', ['class' => 'btn btn-danger']) }}
        {{ Form::close() }}
    </div>
</div>

@endsection