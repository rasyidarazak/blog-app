@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Laravel CMS</h1>
</div>
<form class="user" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" autocomplete="email" placeholder="Enter Email Address...">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">Remember Me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
</form>
<hr>
<!-- @if (Route::has('password.request'))
<div class="text-center">
    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
@endif -->
<div class="text-center">
    <a class="small" href="{{ route('register') }}">Create an Account!</a>
</div>
@endsection