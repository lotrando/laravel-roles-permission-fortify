@extends('layouts.app', ['title' => __('Show paint')])

@section('content')
  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-4">
      <div class="card shadow">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Show paint') }}</h2>
        </div>
        <div class="card-body p-4">
          <div class="mb-3">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row"><strong>{{ __('Department') }}:</strong></th>
                  <td>{{ $paint->department->department_name }}</td>
                </tr>
                <tr>
                  <th scope="row"><strong>{{ __('Responsible person') }}:</strong></th>
                  <td>{{ $paint->user->user_name }}</td>
                </tr>
                <tr>
                  <th scope="row"><strong>{{ __('Od') }}:</strong></th>
                  <td>{{ $paint->date_start }}</td>
                </tr>
                <tr>
                  <th scope="row"><strong>{{ __('Do') }}:</strong></th>
                  <td>{{ $paint->date_end }}</td>
                </tr>
                <tr>
                  <th scope="row"><strong>{{ __('Rooms') }}:</strong></th>
                  <td>{{ $paint->rooms }}</td>
                </tr>
                {{-- <tr>
                  <th scope="row"><strong>{{ __('Doors') }}:</strong></th>
                  <td>{{ $paint->doors }}</td>
                </tr> --}}
                <tr>
                  <th scope="row"><strong>{{ __('Created at') }}:</strong></th>
                  <td>{{ $paint->created_at }}</td>
                </tr>
                <tr>
                  <th scope="row"><strong>{{ __('Status') }}:</strong></th>
                  <td>{{ $paint->status }}</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="mt-3">
            <a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
