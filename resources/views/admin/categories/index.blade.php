@extends('admin.layouts.master')
@section('content')

<input type="hidden" id="model" value="Category">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    Kategori Listesi
                </div>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-sm btn-success" href="{{ route("admin.categories.create") }}">
                    Kategori Ekle
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
                        <th>Üst Kategori</th>
                        <th style="width:80px;">Sıra</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td>
                            {{ $category->id ?? '' }}
                        </td>
                        <td>
                            {{ $category->name ?? '' }}
                        </td>
                        <td>
                            @if($category->parent != null)
                                {{$category->parent->name}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <input type="number" class="form-control change-rank" value="{{$category->rank}}"
                                data-id="{{$category->id}}">
                        </td>
                        <td>
                            <input type="checkbox" value="1" class="flat change-status" data-id="{{$category->id}}"
                                {{ $category->status == 1 ? 'checked' : '' }}>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary align-top" target="_blank" href="{{ base_url().'/category/'.$category->slug }}">
                                <i class="fa fa-arrow-right"></i> Git
                            </a>
                            <a class="btn btn-sm btn-info align-top" href="{{ route('admin.categories.edit', $category->id) }}">
                                <i class="fa fa-pencil"></i> Düzenle
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Emin Misiniz?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Sil</button>
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