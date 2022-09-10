@extends('layouts.auth', ['title' => 'Change profile', 'cardName' => __('Change profile')])

@section('content')
  @if (session('status') == 'profile-information-updated')
    <div class="alert alert-success" role="alert">
      {{ __('Profile information updated') }}
    </div>
  @endif
  <form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method('PUT')
    <div class="row mb-3">
      <div class="col-6">
        <label for="personal_number" class="form-label">
          {{ __('Personal number') }}
        </label>
        <input id="personal_number" type="text" class="form-control @error('personal_number', 'updateProfileInformation') is-invalid @enderror" name="personal_number"
          value="{{ Auth::user()->personal_number, old('personal_number') }}" autofocus>
        @error('personal_number', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-6">
        <label for="title" class="form-label">{{ __('Title') }}</label>
        <input id="title" type="text" class="form-control @error('title', 'updateProfileInformation') is-invalid @enderror" name="title"
          value="{{ Auth::user()->title, old('title') }}">
        @error('title', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
        <input id="last_name" type="text" class="form-control @error('last_name', 'updateProfileInformation') is-invalid @enderror" name="last_name"
          value="{{ Auth::user()->last_name, old('last_name') }}">
        @error('last_name', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-6">
        <label for="first_name" class="form-label">{{ __('First Name') }}</label>
        <input id="first_name" type="text" class="form-control @error('first_name', 'updateProfileInformation') is-invalid @enderror" name="first_name"
          value="{{ Auth::user()->first_name, old('first_name') }}">
        @error('first_name', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-12">
        <label for="email" class="form-label">{{ __('Email Address') }} -
          <span class="text-danger"> {{ __('Changing your address will require you to re-verify your new address!') }}</p>
          </span>
        </label>
        <input id="email" type="email" class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" name="email"
          value="{{ Auth::user()->email, old('email') }}">

        @error('email', 'updateProfileInformation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary">
          {{ __('Update') }}
        </button>
      </div>
    </div>
  </form>
@endsection
