@extends('layouts.auth', ['title' => __('Register'), 'cardName' => __('Register')])

@section('content')
  {{-- Register Form --}}
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row mb-3">
      <div class="col-6">

        <label for="pernum" class="form-label">
          {{ __('Personal number') }}
        </label>
        <input id="pernum" type="text" class="form-control @error('pernum') is-invalid @enderror" name="pernum"
          value="{{ old('pernum') }}" autofocus>

        @error('pernum')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
      <div class="col-6">

        <label for="user_name" class="form-label">
          {{ __('Last Name') }} {{ __('First Name') }}
        </label>
        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
          name="user_name" value="{{ old('user_name') }}">

        @error('user_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-2">
      <div class="col-md-6">

        <label for="email" class="form-label">
          {{ __('Email Address') }}
        </label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
          value="{{ old('email') }}">

        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
      <div class="col-md-6">

        <label for="date_birth" class="form-label">
          {{ __('Birthdate') }}
        </label>
        <input id="date_birth" type="text" class="form-control @error('date_birth') is-invalid @enderror"
          name="date_birth" value="{{ old('date_birth') }}">

        @error('date_birth')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-6">

        <label for="password" class="form-label">
          {{ __('Password') }}
        </label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
          name="password">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
      <div class="col-md-6">

        <label for="password-confirm" class="form-label">
          {{ __('Confirm Password') }}
        </label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

      </div>
    </div>

    <div class="row">
      <div class="col-12">

        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>

      </div>
    </div>
  </form>
@endsection
