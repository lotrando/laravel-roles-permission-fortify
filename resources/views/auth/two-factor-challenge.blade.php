@extends('layouts.app')

@section('title', 'Two Factor Challenge')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-6 col-xl-4">
        <div class="card shadow">
          <div class="card-header">{{ __('Two Factor Challenge') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form method="POST" action="{{ url('/two-factor-challenge') }}">
              @csrf
              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="code" class="form-label">{{ __('Authenticator Code') }}</label>
                  <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" autofocus>
                  @error('code')
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
