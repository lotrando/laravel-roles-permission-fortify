@extends('layout.app')

@section('title', 'Fortify - Reset Password')

@section('content')
  <section class="vh-100 gradient-custom">
    <div class="h-100 container py-5">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-10 col-lg-8 col-xl-6">
          <div class="card card-registration shadow" style="border-radius: 5px;">
            <div class="card-header">
              <h2 class="text-center">Login</h2>
            </div>
            <div class="card-body p-md-5 p-4">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control form-control"
                        value="{{ request()->email }}" />
                    </div>
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="email">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control" />
                    </div>
                    @error('password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="password_confirmation">Password confirmation</label>
                      <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control form-control" />
                    </div>
                    @error('password_confirmation')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="mt-4 pt-2">
                  <div class="d-grid gap-2">
                    <input type="hidden" name="token" value="{{ request()->token }}">
                    <button type="submit" class="btn btn-lg btn-primary">Reset password</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
