@extends('layouts.app')

@section('title', 'Verify Your Email Address')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card shadow">
          <div class="card-header">{{ __('Verify Your Email Address') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
              </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email.') }}
            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
              @csrf
              <button type="submit" class="btn btn-primary mt-2">{{ __('click here to request another') }}</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection