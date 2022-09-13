@extends('layouts.auth', ['title' => 'Change profile', 'cardName' => __('Change profile')])

@section('content')
  @if (session('status') == 'profile-information-updated')
    <div class="alert alert-success" role="alert">
      {{ __('Profile information updated') }}
    </div>
  @endif
  <div class="alert alert-warning" role="alert">
    {{ __('Changing your email address will require you to re-verify your new address!') }}
  </div>
  <form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method('PUT')
    <div class="row mb-3">
      <div class="col-6">
        <label for="pernum" class="form-label">
          {{ __('Personal number') }}
        </label>
        <input id="pernum" type="text"
          class="form-control @error('pernum', 'updateProfileInformation') is-invalid @enderror" name="pernum"
          value="{{ Auth::user()->pernum, old('pernum') }}">
        @error('pernum', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-6">
        <label for="user_name" class="form-label">{{ __('Last Name') }} {{ __('First Name') }}</label>
        <input id="user_name" type="text"
          class="form-control @error('user_name', 'updateProfileInformation') is-invalid @enderror" name="user_name"
          value="{{ Auth::user()->user_name, old('user_name') }}" autofocus>
        @error('user_name', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="date_birth" class="form-label">{{ __('Birthdate') }}</label>
        <input id="date_birth" type="date"
          class="form-control @error('date_birth', 'updateProfileInformation') is-invalid @enderror" name="date_birth"
          value="{{ Auth::user()->date_birth, old('date_birth') }}">

        @error('date_birth', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-6">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input id="email" type="text"
          class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" name="email"
          value="{{ Auth::user()->email, old('email') }}">

        @error('birth_date', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-10">
        <button type="submit" class="btn btn-primary">
          {{ __('Update') }}
        </button>
        <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary">
          {{ __('Back') }}
        </a>
      </div>
  </form>
@endsection
