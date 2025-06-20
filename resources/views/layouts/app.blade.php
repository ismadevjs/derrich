<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Combat Sports App') }}</title>
    <meta content="Combat Sports App Dashboard" name="description" />
    <meta content="Your Name" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config JS -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Laravel Vite CSS -->
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="antialiased">
<!-- Begin page -->
<div class="wrapper">

    <!-- Sidenav Menu Start -->
    <div class="sidenav-menu">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="logo mt-3">
            <span class="logo-light">
                <span class="logo-lg"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></span>
                <span class="logo-sm text-center"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
            </span>
            <span class="logo-dark">
                <span class="logo-lg"><img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo"></span>
                <span class="logo-sm text-center"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
            </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <button class="button-sm-hover">
            <i class="ti ti-circle align-middle"></i>
        </button>

        <!-- Full Sidebar Menu Close Button -->
        <button class="button-close-fullsidebar">
            <i class="ti ti-x align-middle"></i>
        </button>

        <div data-simplebar>
            <!-- Sidenav Menu -->
            <ul class="side-nav mt-4">
                {{-- <li class="side-nav-item">
                    <a href="{{ route('dashboard') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                        <span class="menu-text"> Tableau de bord </span>
                    </a>
                </li> --}}

                <li class="side-nav-title mt-2">Gestion</li>

                @auth
                    <li class="side-nav-item">
                        <a href="{{ route('clubs.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-briefcase"></i></span>
                            <span class="menu-text"> Clubs </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('athletes.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> Athletes </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('arbitres.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-shield"></i></span>
                            <span class="menu-text"> Referees </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('coachs.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-user"></i></span>
                            <span class="menu-text"> Coaches </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('teams.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> Teams </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('salles.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-building"></i></span>
                            <span class="menu-text"> Venues </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('tapis.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-square"></i></span>
                            <span class="menu-text"> Mats </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('competitions.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-trophy"></i></span>
                            <span class="menu-text"> Competitions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('pools.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-list"></i></span>
                            <span class="menu-text"> Pools </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('combats.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-swords"></i></span>
                            <span class="menu-text"> Fights </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('rankings.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-list-numbers"></i></span>
                            <span class="menu-text"> Rankings </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('notifications.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-bell"></i></span>
                            <span class="menu-text"> Notifications </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('spectateurs.index') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-eye"></i></span>
                            <span class="menu-text"> Spectators </span>
                        </a>
                    </li>
                @endauth
                @guest
                 <li class="side-nav-item">
                        <a href="/" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-list"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('live-results') }}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-list"></i></span>
                            <span class="menu-text"> Live Results </span>
                        </a>
                    </li>
                @endguest
            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Sidenav Menu End -->

    <!-- Topbar Start -->
    <header class="app-topbar">
        <div class="page-container topbar-menu">
            <div class="d-flex align-items-center gap-2">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="logo">
                    <span class="logo-light">
                        <span class="logo-lg"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></span>
                        <span class="logo-sm"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
                    </span>
                    <span class="logo-dark">
                        <span class="logo-lg"><img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo"></span>
                        <span class="logo-sm"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
                    </span>
                </a>

                <!-- Sidebar Menu Toggle Button -->
                <button class="sidenav-toggle-button btn btn-secondary btn-icon">
                    <i class="ti ti-menu-deep fs-24"></i>
                </button>

                <!-- Horizontal Menu Toggle Button -->
                <button class="topnav-toggle-button" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="ti ti-menu-deep fs-22"></i>
                </button>

                <!-- Button Trigger Search Modal -->

            </div>

            <div class="d-flex align-items-center gap-2">
                <!-- Search for small devices -->
                <div class="topbar-item d-flex d-xl-none">
                    <button class="topbar-link btn btn-outline-primary btn-icon" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                        <i class="ti ti-search fs-22"></i>
                    </button>
                </div>

                <!-- Light/Dark Mode Button -->
                <div class="topbar-item d-none d-sm-flex">
                    <button class="topbar-link btn btn-outline-primary btn-icon" id="light-dark-mode" type="button">
                        <i class="ti ti-moon fs-22"></i>
                    </button>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <a class="topbar-link btn btn-outline-primary dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" data-bs-offset="0,22" type="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" width="24" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                Guest
                            @endauth
                        </span>
                        <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenue !</h6>
                        </div>
                        @auth

                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item active fw-semibold text-danger">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 w-100 text-start">
                                    <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                    <span class="align-middle">Déconnexion</span>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="dropdown-item">
                                <i class="ti ti-login me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Connexion</span>
                            </a>
                            <a href="{{ route('register') }}" class="dropdown-item">
                                <i class="ti ti-user-plus me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Inscription</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Topbar End -->

    <!-- Search Modal -->


    <!-- Start Page Content -->
    <div class="page-content">
        <div class="page-container">
            <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 text-uppercase fw-bold mb-0">@yield('title', 'Dashboard')</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        @yield('breadcrumbs')
                    </ol>
                </div>
            </div>

            <!-- Session Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </div>
        <!-- container -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="page-container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <script>document.write(new Date().getFullYear())</script> © {{ config('app.name') }}
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="#">Your Name</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- End Page Content -->
</div>
<!-- END wrapper -->

<!-- Vendor JS -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Laravel Vite JS -->
@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>
