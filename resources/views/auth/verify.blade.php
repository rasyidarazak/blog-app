@extends('layouts.main')

@section('title', 'Verify Email')

@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Verify Your Email Address</h1>
</div>

@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif

<small>{{ __('Before proceeding, please check your email for a verification link.') }}</small>
<small>{{ __('If you did not receive the email') }},</small>
<form class="user d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('click here to request another') }}</button>.
</form>
@endsection