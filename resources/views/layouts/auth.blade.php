<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <meta name="description"
        content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="/css/app.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}">
    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
    </script>
</head>

<body>
    <div id="page-container" class="main-content-boxed">
        @yield('content')
        <!-- END Page Container -->
        <script src="/js/codebase.core.min.js"></script>
        <!-- Codebase Core JS -->
        <script src="{{ mix('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        {{-- <!-- <script src="{{ mix('js/laravel.app.js') }}"></script> --> --}}

        <!-- Page JS Plugins -->
        <script src="/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="/js/pages/op_auth_signin.min.js"></script>
        @yield('js_after')
</body>

</html>
