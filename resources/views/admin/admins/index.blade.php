@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    Yönetici Listesi
                </div>
            </div>
            @can('admins_manage')
            <div class="col-6 text-right">
                <a class="btn btn-sm btn-success" href="{{ route("admin.admins.create") }}">
                    Yönetici Ekle
                </a>
            </div>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>İsim</th>
                        <th>Kullanıcı Adı</th>
                        <th>E-Posta</th>
                        <th>Yetki</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $key => $admin)
                    <tr data-entry-id="{{ $admin->id }}">
                        <td>
                            {{ $admin->id ?? '' }}
                        </td>
                        <td>
                            {{ $admin->name ?? '' }}
                        </td>
                        <td>
                            {{ $admin->username ?? '' }}
                        </td>
                        <td>
                            {{ $admin->email ?? '' }}
                        </td>
                        <td>
                            @foreach($admin->roles()->pluck('name') as $role)
                            <span class="badge badge-info">{{ $role }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info align-top" href="{{ route('admin.admins.edit', $admin->id) }}">
                                Düzenle
                            </a>

                            <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST"
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