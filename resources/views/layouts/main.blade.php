<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
        <title>@yield('title', 'Sistem Informasi Hubbul Khoir')</title>

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
        
    </head>
    <body class="g-sidenav-show bg-gray-100">
            <div class="min-height-250 bg-primary position-absolute w-100"></div>
            <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="{{ route('home') }}">
                <img src="/img/logo3.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bolder"></span>
                </a>
            </div>
            <hr class="horizontal dark mt-4" />
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-home text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user management') ? 'active' : '' }}" href="{{ route('users') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if (Auth::user()->hasRole('Pengajar')) --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('data santri') ? 'active' : '' }}" href="{{ route('santris') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Santri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('data nilai') ? 'active' : '' }}" href="{{ route('exam') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Nilai</span>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if (Auth::user()->hasRole('Mahasantri')) --}}
                <li class="nav-item">
                    <a class="nav-link" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-circle text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Portfolio</span>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if (Auth::user()->hasRole('Santri')) --}}
                <li class="nav-item">
                    <a class="nav-link" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-circle text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tugas</span>
                    </a>
                </li>
                {{-- @endif --}}
            </div>
            </aside>

            <main class="main-content position-relative border-radius-lg">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3 mt-2">
                <div class="collapse navbar-collapse me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here..." />
                    </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                            <button class="font-weight-bold px-0">
                                <i class="fa fa-sign-out me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </button>
                        </form>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- End Navbar -->



        
        @yield('content')

            </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    </body>
</html>
