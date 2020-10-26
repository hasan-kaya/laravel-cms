@extends('admin.layouts.master')
@section('content')

<input type="hidden" id="model" value="Block">

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    Yerleşim Listesi
                </div>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-sm btn-success" href="{{ route("admin.blocks.create") }}">
                    Yerleşim Ekle
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
                        <th>Modül</th>
                        <th>Tür</th>
                        <th style="width:80px;">Sıra</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blocks as $block)
                    <tr>
                        <td>{{ $block->id }}</td>
                        <td>{{ trans('general.'.$block->model_name) }}</td>
                        <td>{{ $block->type->description }}</td>
                        <td>
                            <input type="number" class="form-control change-rank" value="{{$block->rank}}"
                                data-id="{{$block->id}}">
                        </td>
                        <td>
                            <input type="checkbox" value="1" class="flat change-status" data-id="{{$block->id}}"
                                {{ $block->status == 1 ? 'checked' : '' }}>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info align-top" href="{{ route('admin.blocks.edit', $block->id) }}">
                                Düzenle
                            </a>
                            <form action="{{ route('admin.blocks.destroy', $block->id) }}" method="POST"
                                onsubmit="return confirm('Emin Misiniz?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-sm btn-danger" value="Sil">
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