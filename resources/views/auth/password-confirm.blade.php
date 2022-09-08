@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-6 col-xl-4">
        <div class="card shadow">
          <div class="card-header">{{ __('Confirm Password') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ url('user/confirm-password') }}">
              @csrf
              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Confirm Two Factor Authentication') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
