@extends('layouts.auth', ['title' => __('Login'), 'cardName' => __('Login')])

@section('title', 'Login')

@section('content')
  {{-- Login Form --}}
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row mb-3">
      <div class="col-12">

        <label for="personal_number" class="form-label">{{ __('Personal number') }}</label>
        <input id="personal_number" type="personal_number" class="form-control @error('personal_number') is-invalid @enderror" name="personal_number" value="{{ old('personal_number') }}"
          autofocus>

        @error('personal_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">

        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-12">
        <div class="form-check">

          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
          </label>

        </div>
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-12">

        <button type="submit" class="btn btn-success">
          {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.email') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        @endif

      </div>
    </div>
  </form>
@endsection
