@extends('admin.layouts.master')

@section('content')

<div class="x_content">
    <div class="row">
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6">
            <div class="tile-stats">
                <div class="icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="count">{{ $posts }}</div>
                <h3>İçerikler</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6">
            <div class="tile-stats">
                <div class="icon">
                    <i class="fa fa-gift"></i>
                </div>
                <div class="count">{{ $products }}</div>
                <h3>Ürünler</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6">
            <div class="tile-stats">
                <div class="icon">
                    <i class="fa fa-sort-amount-desc"></i>
                </div>
                <div class="count">{{ $categories }}</div>
                <h3>Kategoriler</h3>
            </div>
        </div>
    </div>
</div>
@endsection