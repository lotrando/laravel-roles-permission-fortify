@extends('layouts.auth', ['title' => __('Register'), 'cardName' => __('Register')])

@section('content')
  {{-- Register Form --}}
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row mb-3">
      <div class="col-6">

        <label for="personal_number" class="form-label">
          {{ __('Personal number') }}
        </label>
        <input id="personal_number" type="text" class="form-control @error('personal_number') is-invalid @enderror" name="personal_number" value="{{ old('personal_number') }}"
          autofocus>

        @error('personal_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
      <div class="col-6">

        <label for="title" class="form-label">
          {{ __('Title') }}
        </label>
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

        @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">

        <label for="last_name" class="form-label">
          {{ __('Last Name') }}
        </label>
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">

        @error('last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
      <div class="col-6">

        <label for="first_name" class="form-label">
          {{ __('First Name') }}
        </label>
        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">

        @error('first_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div>
    </div>

    <div class="row mb-2">
      <div class="col-md-12">

        <label for="email" class="form-label">
          {{ __('Email Address') }}
        </label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

        @error('email')
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
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

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
