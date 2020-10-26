@extends('admin.layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    İzin Listesi
                </div>
            </div>
            @can('users_manage')
            <div class="col-6 text-right">
                <a class="btn btn-sm btn-success" href="{{ route("admin.permissions.create") }}">
                    İzin Ekle
                </a>
            </div>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                    <tr data-entry-id="{{ $permission->id }}">
                        <td>
                            {{ $permission->id ?? '' }}
                        </td>
                        <td>
                            {{ $permission->name ?? '' }}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info align-top"
                                href="{{ route('admin.permissions.edit', $permission->id) }}">
                                Düzenle
                            </a>

                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST"
                                onsubmit="return confirm('Emin Misiniz ?');"
                                style="display: inline-block;">
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