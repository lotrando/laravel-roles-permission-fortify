@extends('layouts.auth', ['title' => 'Change Password', 'cardName' => __('Change password')])

@section('content')
  @if (session('status') == 'password-updated')
    <div class="alert alert-success" role="alert">
      {{ __('Password changed') }}
    </div>
  @endif
  <form method="POST" action="{{ route('user-password.update') }}">
    @method('PUT')
    @csrf
    <div class="row mb-4">
      <div class="col-md-12">
        <label for="password" class="form-label">{{ __('Old Password') }}</label>
        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"
          name="current_password" value="password" autofocus>

        @error('current_password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-6">
        <label for="password" class="form-label">{{ __('New Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
          name="password">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-md-6">
        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary">
          {{ __('Change') }}
        </button>
        <a href="{{ route('home') }}" type="button" class="btn btn-secondary">
          {{ __('Cancel') }}
        </a>
      </div>
    </div>
  </form>
@endsection
