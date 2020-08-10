<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Topnav -->
    @if (auth()->user()->role == 'admin')
    @include('layouts.navbars.adminMenu')
    <div class="main-content" id="panel">
        @include('layouts.navs.adminNav')
        @else
        @include('layouts.navbars.memberMenu')
        <div class="main-content" id="panel">
            @include('layouts.navs.memberNav')
            @endif
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <!-- Header -->
            @yield('content')
            <!-- Page content -->
            <div class="container-fluid mt-md-6">
                <!-- Footer -->
                <footer class="footer pt-0">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6">
                            <div class="copyright text-center  text-lg-left  text-muted">
                                &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">@Agus Prayogi</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative
                                        Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link"
                                        target="_blank">About
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                                        class="nav-link" target="_blank">MIT License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
