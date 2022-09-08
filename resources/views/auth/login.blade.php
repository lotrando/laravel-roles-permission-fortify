@extends('layout.app')

@section('title', 'Fortify - Login')

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
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="personal_number">Personal Number</label>
                      <input type="text" id="personal_number" name="personal_number"
                        class="form-control form-control" />
                    </div>
                    @error('personal_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control" />
                    </div>
                    @error('password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="mt-4 pt-2">
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                    <a href="{{ route('password.request') }}">Forgot password ?</a>
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
