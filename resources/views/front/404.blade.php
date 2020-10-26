@extends('front.layout',[
    'title' => trans('general.page_not_found'),
])

@section('content')

@include('front.partials.breadcrumb', [
    'title' => trans('general.page_not_found'),
    'description' => trans('general.page_not_found_description'),
])

@endsection