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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/sp_logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .allbutfooter{
            flex: 1;
        }
    </style>
</head>
<body>
    <div id="app" class="allbutfooter">
        <nav class="navbar navbar-expand-md navbar navbar-dark bg-danger bg-lighten-xs shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'AEV@SP') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-danger" data-tor="hover:bg-darken(sm)" href="{{ route('queue') }}">{{ __('Queue') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" data-tor="hover:bg-darken(sm)" href="{{ route('booking') }}">{{ __('Snatch It!') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin Controls
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logs') }}">Logs</a>
                                    {{-- <a class="dropdown-item" href="{{ route('manage_locations') }}">Logs</a> --}}
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" data-tor="hover:bg-darken(sm)" href="{{ route('queue') }}">{{ __('Queue') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" data-tor="hover:bg-darken(sm)" href="{{ route('booking') }}">{{ __('Snatch It!') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-dark text-center text-white sticky-bottom">      
        <div class="container pt-1">
            <section class="mb-1">
                Singapore Polytechnic | Contact us : 
                <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.facebook.com/singaporepolytechnic/" role="button"
                    ><i class="fa fa-facebook"></i
                ></a>

                <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.instagram.com/singaporepoly/?hl=en" role="button"
                    ><i class="fa fa-instagram"></i
                ></a>

                <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://twitter.com/singaporepoly?lang=en" role="button"
                    ><i class="fa fa-twitter"></i
                ></a>
            </section>
        </div>
        <!-- Socket -->
        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; ROS-Team SP 5G-Enabled Autonomous Surveillance Vehicle AY2022/2023 S1
        </div>
    </footer>
</body>
</html>
