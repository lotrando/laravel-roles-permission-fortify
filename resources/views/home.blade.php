@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">{{ __('Home') }}</div>

          <div class="card-body">
            You are verified and loged in!
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
