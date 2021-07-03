<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left side of navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ url()->current() !== route('event_index') ?: 'active' }}">
                        <a class="nav-link" href="{{ route('event_index') }}">Upcoming Events <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Past Events</a>
                    </li>
                </ul>

                <!-- Center of the Navbar -->
                <ul class="navbar-nav mc-auto">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </ul>

                <!-- Right side of navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user_profile') }}"><i class="fas fa-user"></i> Your Profile</a>
                                <a class="dropdown-item" href="{{ route('user_reservation') }}"><i class="fas fa-ticket-alt"></i> Your Reservations</a>
                                @if (Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{ route('user_reservation') }}"><i class="fas fa-toolbox"></i> Admin Panel</a>
                                @endif
                                @if (Auth::user()->isVenueAdmin())
                                    <a class="dropdown-item" href="{{ route('user_reservation') }}"><i class="fas fa-toolbox"></i> Admin Panel</a>
                                @endif
                                <hr>
                                <a class="dropdown-item" href="{{ route('venue_create') }}"><i class="fas fa-plus"></i> Create New Venue</a>
                                <a class="dropdown-item" href="{{ route('venue_list') }}"><i class="far fa-list-alt"></i> Your Venue List</a>
                                @endif
                                @if (Auth::user()->isEventAdmin())
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('event_create') }}"><i class="fas fa-plus"></i> Create New Event</a>
                                    <a class="dropdown-item" href="{{ route('event_list') }}"><i class="far fa-list-alt"></i> Your Event List</a>
                                @endif
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container-fluid pl-1 pr-1">
            @yield('content')
        </div>
    </main>
    @if (session()->has('type'))
        <notification type="{{ session('type') }}" message="{{ session('message') }}" timer="{{ session('messageTimer') }}"></notification>
    @endif
</div>
</body>
</html>
