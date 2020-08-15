<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('app/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('app/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('app/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('app/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('app/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('app/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('app/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('app/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('app/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{ asset('app/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('app/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/style.css')}}">

</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-sm-6 pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+62 881 7935 154</span>
                        </div>
                        <div class="col-sm-6 pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">agus21apy@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">OOTD-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    @if (isset(Auth::user()->role))
                    @if (auth()->user()->role == 'admin')
                    <li class="nav-item"><a href="{{ route('member.home') }}" class="nav-link">Home</a></li>
                    @else
                    @if (Auth::user()->role == 'member')
                    <li class="nav-item"><a href="{{ route('member.home') }}" class="nav-link">Home</a></li>
                    @else
                    <li class="nav-item {{ request()->is('/')? 'active' : ''}}"><a href="{{ route('home') }}"
                            class="nav-link">Home</a></li>
                    @endif
                    @endif
                    @else
                    <li class="nav-item {{ request()->is('/')? 'active' : ''}}"><a href="{{ route('home') }}"
                            class="nav-link">Home</a></li>
                    @endif
                    {{-- @can('isAdmin')
                    <li class="nav-item active"><a href="{{ route('admin.home') }}" class="nav-link">Home</a></li>
                    @endcan
                    @can('isMember')
                    <li class="nav-item active"><a href="{{ route('member.home') }}" class="nav-link">Home</a></li>
                    @endcan --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Catalog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Shop</a>
                            <a class="dropdown-item" href="#">Single Product</a>
                            <a class="dropdown-item" href="#">Cart</a>
                            <a class="dropdown-item" href="#">Checkout</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span
                                class="icon-shopping_cart"></span>[0]</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">OOTD-Shop</h2>
                        <p>Far far away, behind the word mountains, far from the countries Indonesia.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Wonosari Malang, Jawa
                                        Timur , Indonesia</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 881 7935
                                            154</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">agus21apy@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved @agus prayogi
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>
    <script src="{{ asset('app/js/jquery.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ asset('app/js/popper.min.js')}}"></script>
    <script src="{{ asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('app/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('app/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('app/js/aos.js')}}"></script>
    <script src="{{ asset('app/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset('app/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('app/js/scrollax.min.js')}}"></script>
    <script src="{{ asset('app/js/google-map.js')}}"></script>
    <script src="{{ asset('app/js/main.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
</body>

</html>
