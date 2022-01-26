@extends('layouts.main')

@section('title', 'Confirm Password')

@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Confirm Password</h1>
</div>

<small>{{ __('Please confirm your password before continuing.') }}</small>

<form class="user" method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="form-group">
        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">Confirm Password</button>
</form>
<hr>
@if (Route::has('password.request'))
<div class="text-center">
    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
@endif
@endsection