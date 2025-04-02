<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        /* Navbar fixed and improved styles */
        .navbar {
            background: linear-gradient(135deg, #3498db, #8e44ad);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f39c12;
        }

        .navbar-nav .nav-item {
            margin-right: 20px;
        }

        .navbar-nav .nav-link i {
            margin-right: 8px;
        }

        .navbar-nav .nav-link .badge {
            background-color: #e74c3c;
        }

        /* Sticky footer padding */
        main {
            padding-top: 100px; /* To ensure content doesn't overlap with fixed navbar */
        }

        /* SweetAlert styling */
        .swal2-popup {
            font-family: 'Nunito', sans-serif !important;
        }

        /* Make navbar responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            .navbar-nav {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <div class="container">
            @auth
                <a class="navbar-brand" href="/home">
                    {{ config('app.name', 'Educafacil') }}
                </a>
                @else
                <a class="navbar-brand" href="/">
                    {{ config('app.name', 'Educafacil') }}
                </a>
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Profile')}}">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://chat.whatsapp.com/TU-LINK-AQUI">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">¿Quieres apoyarnos?</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-bell"></i>
                                    <span class="badge bg-danger">3</span>
                                </a>
                            </li>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- SweetAlert Notification Example -->
    <script>
        @if(session('status'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('status') }}'
            });
        @endif
    </script>
</body>
</html>
