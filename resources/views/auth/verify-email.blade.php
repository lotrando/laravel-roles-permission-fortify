@extends('layouts.auth', ['title' => 'Verify Email', 'cardName' => __('Verify Your Email Address')])

@section('content')
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
  @endif

  {{ __('Before proceeding, please check your email for a verification link.') }}
  {{ __('If you did not receive the email,') }}

  <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="btn btn-link m-0 p-0 align-baseline">{{ __('click here to request another') }}</button>.
  </form>
@endsection
