@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        @if(isset($value))
        Dil Parametresi Düzenle
        @else
        Yeni Dil Parametresi Ekle
        @endif
    </div>
    <div class="card-body">

        @if(isset($value))
        {{ Form::model($value, ['route' => ['admin.language-values.update', $value->id], 'method' => 'patch']) }}
        @else
        {{ Form::open(['route' => 'admin.language-values.store']) }}
        @endif

        <div class="form-group {{ $errors->has('group') ? 'has-error' : '' }}">
            {{ Form::label('group', 'Grup*') }}
            {{ Form::text('group', old('group'), ['class'=>'form-control']) }}
            @if($errors->has('group'))
                <em class="invalid-feedback d-block">
                    {{ $errors->first('group') }}
                </em>
            @endif
        </div>

        <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
            {{ Form::label('key', 'Parametre*') }}
            {{ Form::text('key', old('key'), ['class'=>'form-control']) }}
            @if($errors->has('key'))
                <em class="invalid-feedback d-block">
                    {{ $errors->first('key') }}
                </em>
            @endif
        </div>

        {{ Form::submit('Kaydet', ['class' => 'btn btn-danger']) }}
        {{ Form::close() }}
    </div>
</div>
@endsection