@extends('layout.app')

@section('title', 'Fortify - Register')

@section('content')
  <section class="vh-100 gradient-custom">
    <div class="h-100 container py-5">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-10 col-lg-8 col-xl-6">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-md-5 p-4">
              <h2 class="pb-md-0 mb-md-5 mb-2 pb-2 text-center">Registration Form</h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="personal_number">Personal Number</label>
                      <input type="text" id="personal_number" name="personal_number"
                        value="{{ old('personal_number') }}" class="form-control form-control" />
                    </div>
                    @error('personal_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="last_name">Last Name</label>
                      <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                        class="form-control form-control" />
                    </div>
                    @error('last_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="first_name">First Name</label>
                      <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                        class="form-control form-control" />
                    </div>
                    @error('first_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="email_address">Email</label>
                      <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control form-control" />
                    </div>
                    @error('email')
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

                <div class="row">
                  <div class="col-md-12 mb-2">

                    <div class="form-outline">
                      <label class="form-label" for="password_confirmation">Password Confirmation</label>
                      <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control form-control" />
                    </div>

                  </div>
                </div>

                <div class="mt-4 pt-2">
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-primary">Register</button>
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
