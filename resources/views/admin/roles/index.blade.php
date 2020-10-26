@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    Yetki Listesi
                </div>
            </div>
            @can('users_manage')
            <div class="col-6 text-right">
                <a class="btn btn-sm btn-success" href="{{ route("admin.roles.create") }}">
                    Yetki Ekle
                </a>
            </div>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>İzinler</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td>
                                {{ $role->id ?? '' }}
                            </td>
                            <td>
                                {{ $role->name ?? '' }}
                            </td>
                            <td>
                                @foreach($role->permissions()->pluck('name') as $permission)
                                    <span class="badge badge-info">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info align-top" href="{{ route('admin.roles.edit', $role->id) }}">
                                    Düzenle
                                </a>

                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Emin Misiniz?');" style="display: inline-block;">
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