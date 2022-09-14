@extends('layouts.app', ['title' => __('Show paint')])

@section('content')
  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-6">
      <div class="card">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Show paint') }}</h2>
        </div>
        <div class="card-body p-4">
          <div class="mb-3">
            <p><strong>{{ __('Department') }}:</strong> {{ $paint->department->department_name }}</p>
            <p><strong>{{ __('Responsible person') }}:</strong> {{ $paint->user->user_name }}</p>
            <p><strong>{{ __('Od') }}:</strong> {{ $paint->date_start }}</p>
            <p><strong>{{ __('Do') }}:</strong> {{ $paint->date_end }}</p>
            <p><strong>{{ __('Rooms') }}:</strong> {{ $paint->rooms }}</p>
            <p><strong>{{ __('Doors') }}:</strong> {{ $paint->doors }}</p>
            <p><strong>{{ __('Speciální požadavek') }}:</strong> {{ $paint->specials }}
            </p>
            <p><strong>{{ __('Created at') }}:</strong> {{ $paint->created_at }}</p>
            <p><strong>{{ __('Status') }}:</strong> {{ $paint->status }}</p>
          </div>
          <div class="mt-3">
            <a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
