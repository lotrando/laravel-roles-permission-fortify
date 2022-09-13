@extends('layouts.app', ['title' => __('Welcome'), 'cardName' => __('Welcome')])

@section('content')
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <a href="{{ route('user.reservations.index') }}"><img alt="Malování" class="card-img-top" src="{{ asset('img/painting.jpg') }}"></a>
        <div class="card-body">
          <h6 class="card-title text-muted text-center">Rezervace malování místností v KHN a.s.</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <a href="{{ route('user.bikes.index') }}"><img alt="Elektrokola" class="card-img-top" src="{{ asset('img/bikes.jpg') }}"></a>
        <div class="card-body">
          <h6 class="card-title text-muted text-center">Rezervace pronájmu Elektrokol a Autoboxů</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <a href="https://docs.google.com/spreadsheets/d/19Tzhxrq7tVBpZ7LhZ5qEL6ehI3om3q6b/edit#gid=1690889270"><img
            alt="Pneumatiky" class="card-img-top" src="{{ asset('img/pneu.jpg') }}"></a>
        <div class="card-body">
          <h6 class="card-title text-muted text-center">Rezervace výměny pneumatik</h6>
        </div>
      </div>
    </div>
  </div>
@endsection
