@extends('layouts.app', ['title' => __('Edit paint')])

@section('content')
  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-8">
      <div class="card">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Edit paint') }}</h2>
        </div>
        <div class="card-body p-4">
          <form action="{{ route('user.paints.update', $paint->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="department_id" class="form-label">{{ __('Department') }}</label>
                <select type="text" class="form-control @error('department_id') is-invalid @enderror"
                  id="department_id" name="department_id">
                  <option value="{{ $paint->department_id ?? ' ' }}">
                    {{ $paint->department->department_code ?? ' ' }} -
                    {{ $paint->department->department_name ??
                        'Choose
                    									department ...' }}
                  </option>
                  @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_code }} -
                      {{ $department->department_name }}</option>
                  @endforeach
                </select>
                @error('department_id')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label for="date_start" class="form-label">{{ __('From') }}</label>
                <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="date_start"
                  name="date_start" value="{{ $paint->date_start }}">
                @error('date_start')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-6 mb-3">
                <label for="date_end" class="form-label">{{ __('To') }}</label>
                <input type="date" class="form-control @error('date_end') is-invalid @enderror" id="date_end"
                  name="date_end" value="{{ $paint->date_end }}">
                @error('date_end')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="rooms" class="form-label">{{ __('Rooms') }}</label>
              <input type="text" class="form-control @error('rooms') is-invalid @enderror" id="rooms"
                name="rooms" value="{{ $paint->rooms }}">
              @error('rooms')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="doors" class="form-label">{{ __('Doors') }}</label>
              <input type="text" class="form-control @error('doors') is-invalid @enderror" id="doors"
                name="doors" value="{{ $paint->doors }}">
              @error('doors')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="specials" class="form-label">{{ __('Specials') }}</label>
              <input type="text" class="form-control @error('specials') is-invalid @enderror" id="specials"
                name="specials" value="{{ $paint->specials }}">
              @error('specials')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">{{ __('Status') }}</label>
              <select type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                name="status">
                <option value="{{ $paint->status ?? 'Vloženo' }}">
                  {{ $paint->status ?? 'Vloženo' }}
                </option>
                @can('is-admin')
                  <option value="Vloženo">Vloženo</option>
                  <option value="Schváleno">Schváleno</option>
                @endcan
              </select>
              @error('status')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <input type="hidden" class="form-control" name="user_id" value="{{ $paint->user->id }}">
            <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
