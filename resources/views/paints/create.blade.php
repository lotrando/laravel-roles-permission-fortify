@extends('layouts.app', ['title' => __('Create Reservation')])

@section('content')
  <div class="card shadow-lg">
    <div class="card-header">
      <h4 class="pt-1 text-center">{{ __('Create Reservation') }}</h4>
    </div>
    <div class="card-body p-4">
      <form action="{{ route('user.paints.store') }}" method="POST">
        @include('paints.partials.form', ['action' => 'Vytvořit'])
      </form>
    </div>
  </div>
@endsection
