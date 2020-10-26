@extends('admin.layouts.master')

@section('content')
<form class="login-form" role="form" method="POST" action="{{ route('admin.change-password.update') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Eski Şifre</label>
        <input id="passwordold" type="password" class="form-control form-control-solid placeholder-no-fix"
            name="passwordold">
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Yeni Şifre</label>
        <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix" name="password">
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Yeni Şifre Tekrarı</label>
        <input id="password-confirm" type="password" class="form-control form-control-solid placeholder-no-fix"
            name="password_confirmation">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Şifremi Değiştir</button>
    </div>
</form>
@endsection