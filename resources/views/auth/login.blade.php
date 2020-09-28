@extends('auth.master')

<body style ="background-color:papayawhip;">


<div class="auth-box row">
<div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(public/images/bg.jpg);">
</div>
<div class="col-lg-5 col-md-7 bg-pink">
</div>
</div>


  

{{-- Title --}}
@section('title', "An-Najm Prestasi - Login")

@section('auth-content')
<p class="login-box-msg">Silahkan masukkan email dan password..</p>
@if ($errors->any())
<div class="alert alert-danger">
    <i class="icon fas fa-ban"></i> Invalid Email or Password
</div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required
            autocomplete="email" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" required autocomplete="current-password"
            placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Ingat Saya
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk </button>
        </div>
        <!-- /.col -->
    </div>
</form>

{{-- @if (Route::has('password.request'))
<p class="mb-1 mt-3">
    <a href="{{ route('password.request') }}">Lupa Password</a>
</p>
@endif --}}

@if (Route::has('register'))
<p class="mb-0">
    <a href="{{ route('signup') }}" class="text-center">Daftar Akun Baru</a>
</p>
@endif
@endsection