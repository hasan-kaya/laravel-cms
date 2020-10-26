@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="module-title">
            Yetki Düzenle
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Başlık*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                <label for="permission">İzinler*
                    <span class="btn btn-info btn-sm select-all">Tümünü Seç</span>
                    <span class="btn btn-info btn-sm deselect-all">Tümünü Bırak</span></label>
                <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permission'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permission') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Kaydet">
            </div>
        </form>
    </div>
</div>
@endsection