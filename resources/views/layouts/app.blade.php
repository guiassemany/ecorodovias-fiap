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

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

    @stack('extra-css')
</head>
<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="ion-close"></i>
        </button>

        <div class="left-side-logo d-block d-lg-none">
            <div class="text-center">
                SmartVias
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('dashboard')}}" class="waves-effect">
                            <i class="dripicons-meter"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('officialVehicles.search')}}" class="waves-effect">
                            <i class="fa fa-car"></i><span> Viaturas </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('occurrences.search')}}" class="waves-effect">
                            <i class="dripicons-warning"></i><span> Ocorrências </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('occurrences.map')}}" class="waves-effect">
                            <i class="dripicons-map"></i><span> Mapa de Ocorrências </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" class="waves-effect">
                            <i class="dripicons-arrow-left"></i><span> Logout </span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <div class="topbar-left	d-none d-lg-block">
                    <div class="text-center">

                        <a href="{{route('dashboard')}}" class="logo">
                            <h3 class="text-white mt-4">SmartVias</h3>
                        </a>
                    </div>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <span class="text-white">USUÁRIO: <b>{{Auth::user()->name}}</b></span>
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/images/users/nouser.png')}}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                </nav>

            </div>
            <!-- Top Bar End -->

            <div class="page-content-wrapper ">
                @yield('content')
            </div> <!-- Page content Wrapper -->

        </div> <!-- content -->

        <footer class="footer">
            © 2019 <b>SmartVias</b> <span class="d-none d-sm-inline-block"> - Desenvolvido com <i class="mdi mdi-heart text-danger"></i> by FIAP.</span>
        </footer>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

@stack('extra-js')

</body>
</html>
