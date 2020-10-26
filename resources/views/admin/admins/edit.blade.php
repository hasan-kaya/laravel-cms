@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Yönetici Düzenle
    </div>

    <div class="card-body">
        <form action="{{ route("admin.admins.update", [$admin->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">İsim*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($admin) ? $admin->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">Kullanıcı Adı*</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username', isset($admin) ? $admin->username : '') }}" required>
                @if($errors->has('username'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('username') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Posta*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($admin) ? $admin->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('password') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">Yetkiler*
                    <span class="btn btn-info btn-sm select-all">Tümünü Seç</span>
                    <span class="btn btn-info btn-sm deselect-all">Tümünü Bırak</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($admin) && $admin->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback d-block">
                        {{ $errors->first('roles') }}
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