<!doctype html>
<html lang="{{ str_replace('_', '-', Auth::user()->locale ?? app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <title>{{ $title }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/particles.js') }}"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- Left Side Of Navbar --}}
        <ul class="navbar-nav me-auto">

        </ul>

        {{-- Right Side Of Navbar --}}
        <ul class="navbar-nav ms-auto">
          {{-- Authentication Links --}}
          @guest
            @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif

            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->pernum . ' - ' . Auth::user()->user_name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                {{-- Button trigger modal --}}
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                  {{ __('Logout') }}
                </button>
                <a href="{{ route('profile.update') }}" class="dropdown-item">
                  {{ __('Change profile') }}
                </a>
                <a href="{{ route('passwords.update') }}" class="dropdown-item">
                  {{ __('Change password') }}
                </a>
                <a href="{{ route('two-factor-auth') }}" class="dropdown-item">
                  {{ __('Two Factor Auth') }}
                </a>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-5">
          <div class="card mt-3 shadow">
            <div class="card card-header bg-secondary text-white">
              {{ $cardName }}
            </div>
            <div class="card-body">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Logout Modal --}}
  <div class="modal fade" tabindex="-1" id="logout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Logout') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">{{ __('Are you sure ?') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
          <a role="button" class="btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
