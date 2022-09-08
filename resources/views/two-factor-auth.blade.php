@extends('layouts.app')

@section('title', 'Two Factor Authentication Setting')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-6">
        <div class="card shadow">
          <div class="card-header">{{ __('Two Factor Authentication Setting') }}</div>

          <div class="card-body">
            @if (session('status') == 'two-factor-authentication-confirmed')
              <div class="alert alert-success" role="alert">
                Two factor authentication confirmed by mail
              </div>
            @endif
            @if (!auth()->user()->two_factor_secret)
              <div class="alert alert-danger" role="alert">
                Two Factor Authentication disabled.
              </div>

              <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                <button type="submit" class="btn btn-success">
                  {{ __('Enable') }}
                </button>
              </form>
            @else
              <div class="alert alert-success" role="alert">
                Two Factor Authentication enabled.
              </div>

              <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2">
                  {{ __('Disable') }}
                </button>
              </form>
            @endif

            @if (session('status') == 'two-factor-authentication-enabled')
              <div class="row">
                <div class="col-12">
                  <p class="text-justify">
                    Scan the QR code into your phones authenticator application for login to your account.
                  </p>
                  {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>
                <div class="col-12 mt-3">
                  <p class="text-justify">
                    Store these codes in secure location for recovery account without phones authenticator application.
                  </p>
                  <code>
                    <strong>
                      @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                        {{ trim($code) }}<br>
                      @endforeach
                    </strong>
                  </code>
                </div>
              </div>
              <form method="POST" action="{{ url('user/confirmed-two-factor-authentication') }}">
                @csrf
                <button type="submit" class="btn btn-success">
                  {{ __('Confirm') }}
                </button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
