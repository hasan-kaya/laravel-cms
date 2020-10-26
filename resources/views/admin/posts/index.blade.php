@extends('admin.layouts.master')
@section('content')

<style>
    .filters .form-control {
        height: 31px;
        font-size: 14px;
    }
</style>

<input type="hidden" id="model" value="Post">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <div class="module-title">
                    İçerik Listesi
                </div>
            </div>
            <div class="col-md-8 filters">
                {{ Form::open(['route' => 'admin.posts.index', 'method' => 'GET']) }}
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::text('name', Request::get('name'), ['placeholder' => 'Başlık', 'class'=>'form-control']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::select('type', \App\Enums\PostType::toSelectArray(), Request::get('type'), ['placeholder' => 'Tüm Türler', 'class'=>'form-control']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::select('category', $categories, Request::get('category'), ['placeholder' => 'Tüm Kategoriler', 'class'=>'form-control']) }}
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-sm btn-primary">Filtrele</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-2 text-right">
                <a class="btn btn-sm btn-block btn-success" href="{{ route("admin.posts.create") }}">
                    İçerik Ekle
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>Tür</th>
                        <th>Kategori</th>
                        <th style="width:80px;">Sıra</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id ?? '' }}
                        </td>
                        <td>
                            {{ $post->name ?? '' }}
                        </td>
                        <td>{{ $post->type->description }}</td>
                        <td>{{ $post->category_names }}</td>
                        <td>
                            <input type="number" class="form-control change-rank" value="{{$post->rank}}"
                                data-id="{{$post->id}}">
                        </td>
                        <td>
                            <input type="checkbox" value="1" class="flat change-status" data-id="{{$post->id}}"
                                {{ $post->status == 1 ? 'checked' : '' }}>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary align-top" target="_blank"
                                href="{{ get_url($post->type->key, $post->slug) }}">
                                <i class="fa fa-arrow-right"></i> Git
                            </a>
                            <a class="btn btn-sm btn-info align-top" href="{{ route('admin.posts.edit', $post->id) }}">
                                <i class="fa fa-pencil"></i> Düzenle
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                onsubmit="return confirm('Emin Misiniz?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>
                                    Sil</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection