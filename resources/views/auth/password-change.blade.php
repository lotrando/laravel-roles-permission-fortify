@extends('layouts.app', ['title' => 'Change Password', 'cardName' => __('Change password')])

@section('content')
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  <form method="POST" action="{{ url('user/password') }}">
    @method('PUT')
    @csrf
    <div class="row mb-4">
      <div class="col-md-12">
        <label for="password" class="form-label">{{ __('Old Password') }}</label>
        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">

        @error('old_password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-6">
        <label for="password" class="form-label">{{ __('New Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

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
      </div>
    </div>
  </form>
@endsection
