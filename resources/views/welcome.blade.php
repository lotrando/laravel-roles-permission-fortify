@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-lg-8 col-xl-6">
        <div class="card shadow">
          <div class="card-header">{{ __('Welcome') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            Welcome to Laravel Fortify starter kit by Lotrando
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
