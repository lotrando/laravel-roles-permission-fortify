@extends('layouts.app', ['title' => 'Home', 'cardName' => __('Home')])

@section('content')
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  You are verified and loged in!
@endsection
