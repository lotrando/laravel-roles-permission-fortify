@extends('layout.app')

@section('title', 'Fortify - Home')

@section('content')
  <section class="vh-100 gradient-custom">
    <div class="h-100 container py-5">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-10">
          <div class="card card-registration shadow" style="border-radius: 5px;">
            <div class="card-header">
              <h2 class="text-center">Forgot Password</h2>
            </div>
            <div class="card-body p-md-5 p-4">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
