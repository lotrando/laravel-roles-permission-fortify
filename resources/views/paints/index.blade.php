@section('content')
  <div class="container-fluid d-flex justify-content-center align-items-center mx-auto">
    <div class="col-12">
      @include('partials.alert')
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h2 class="mb-0">{{ __('Paint Reservations') }}</h2>
          <a href="{{ route('paints.create') }}" class="btn btn-success">
            {{ __('New Reservation') }}
          </a>
        </div>
        <div class="card-body p-4">
          <table class="table-hover table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">@sortablelink('department.department_name', __('Department'))</th>
                <th scope="col">@sortablelink('user.user_name', __('Odpovědná osoba'))</th>
                <th scope="col">@sortablelink('date_start', __('Od'))</th>
                <th scope="col">@sortablelink('date_end', __('Do'))</th>
                <th scope="col">{{ __('Rooms') }}</th>
                {{-- <th scope="col">{{ __('Doors') }}</th>
							<th scope="col">{{ __('Specials') }}</th> --}}
                <th scope="col">{{ __('Created at') }}</th>
                <th scope="col">{{ __('Status') }}</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reservations as $paint)
                <tr class="@if ($paint->status === 'Schváleno') table-success @endif">
                  <td class="pt-3" scope="row">
                    {{ $paint->id }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ $paint->department->department_name }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ $paint->user->user_name }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ date('d. m. Y', strtotime($paint->date_start)) }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ date('d. m. Y', strtotime($paint->date_end)) }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ $paint->rooms }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ $paint->created_at }}
                  </td>
                  <td class="pt-3" scope="row">
                    {{ $paint->status }}
                  </td>
                  <td width="200px" align="right">
                    <a href="{{ route('paints.show', $paint->id) }}" class="btn btn-secondary"><i
                        class="fa-regular fa-eye"></i></a>
                    @if ($paint->user_id === Auth::user()->id and $paint->status === 'Vloženo')
                      <a href="{{ route('user.paints.edit', $paint->id) }}" class="btn btn-primary"><i
                          class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete-modal-{{ $paint->id }}"><i class="fa-solid fa-trash"></i>
                      </button>
                    @else
                      @can('is-admin')
                        <a href="{{ route('paints.edit', $paint->id) }}" class="btn btn-primary"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                          data-bs-target="#delete-modal-{{ $paint->id }}"><i class="fa-solid fa-trash"></i>
                        </button>
                      @endcan
                    @endif
                  </td>
                </tr>
                <div class="modal fade" id="delete-modal-{{ $paint->id }}" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete paint') }}</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center">{{ __('Delete paint') }} ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                          data-bs-dismiss="modal">{{ __('Back') }}</button>
                        <div x-data>
                          <form id="delete-user-form-{{ $paint->id }}" @submit.prevent
                            action="{{ route('user.paints.destroy', $paint->id) }}" method="POST">
                            <button on-click="" class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                            @csrf
                            @method('DELETE')
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        {{ $paints->links() }}
      </div>
    </div>
  </div>
@endsection
