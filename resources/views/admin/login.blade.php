@extends('admin.layouts.auth')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
    {{ csrf_field() }}
    <h1>Yönetici Girişi</h1>

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <input placeholder="Kullanıcı Adı" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input placeholder="Şifre" id="password" type="password" class="form-control" name="password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <div class="checkbox text-left">
            <label>
                <input type="checkbox" name="remember"> Beni Hatırla
            </label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Giriş Yap
        </button>
    </div>

</form>
@endsection
