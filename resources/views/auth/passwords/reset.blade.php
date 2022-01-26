@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
</div>

<form class="user" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="form-group">
        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address"/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-6">
            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" autocomplete="new-password" placeholder="Repeat Password"/>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
</form>
@endsection