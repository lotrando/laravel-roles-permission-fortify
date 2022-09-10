@extends('layouts.auth', ['title' => 'Change Password', 'cardName' => __('Two Factor Authentication activation')])

@section('title', 'Two Factor Authentication activation')

@section('content')
  @if (!auth()->user()->two_factor_secret)
    <div class="alert alert-danger" role="alert">
      {{ __('Two Factor Authentication disabled.') }}
    </div>
    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
      @csrf
      <button type="submit" class="btn btn-success">
        {{ __('Enable') }}
      </button>
    </form>
  @else
    <div class="alert alert-success" role="alert">
      {{ __('Two Factor Authentication enabled.') }}
    </div>
    <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">
        {{ __('Disable') }}
      </button>
    </form>
  @endif

  @if (session('status') == 'two-factor-authentication-enabled')
    <div class="row">
      <div class="col-12 mt-3">
        <p class="text-center">
          {{ __('Scan the QR code into your authenticator application for login to your account.') }}
        </p>
        <div class="text-center">
          {!! auth()->user()->twoFactorQrCodeSvg() !!}
        </div>
      </div>
      <div class="col-12 mt-3 mb-3">
        <p class="text-center">
          {{ __('Copy these codes in secure location for recovery account.') }}
        </p>
        <div class="text-center">
          <code>
            <strong>
              @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                {{ trim($code) }}<br>
              @endforeach
            </strong>
          </code>
        </div>
      </div>
    </div>
  @endif
@endsection
