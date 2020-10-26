@extends('admin.layouts.master')

@section('content')

<form method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
    {!! csrf_field() !!}

    @if(count(config('setting_fields', [])) )
    @foreach(config('setting_fields') as $section => $fields)

    <div class="x_panel">
        <div class="x_title">
            <h2><i class="{{ $fields['icon'] }}"></i> {{ $fields['title'] }} <small>{{ $fields['desc'] }}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @foreach($fields['elements'] as $field)
            @includeIf('admin.settings.fields.' . $field['type'] )
            @endforeach
        </div>
    </div>

    @endforeach
    @endif

    <button class="btn-primary btn">
        Kaydet
    </button>
</form>

@endsection