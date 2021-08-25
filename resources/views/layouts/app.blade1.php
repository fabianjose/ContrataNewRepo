<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="icon" type="image/png" href="{{asset('images/intercolombia.png') }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(Auth::user())
        <meta name="jwt-token" content="{{ Session::Get('JWT') }}">
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="re-captcha-key" content="{{ config('captcha.site_key') }}" >
    <!-- Base URL -->
    <meta name="description" content="buscador de internet en toda colombia"/>
    <meta name="base-url" content="{{ URL::to('/') }}">
    <meta name="keywords" content="contratar internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas, internet empresas, internet fibra optica,
    internet en bogota, internet para pueblos, internetpara mi casa, internet pymes,
    internet business, internet radio, internet economico, internet rapido, el internet
    mas economico de colombia, colombia internet, internet barato, tigo, claro, net2phone,
    telefonia ip, telefonia movil, voz sobre ip, telefonos grandStream, internexa, 
    azteca comunicaciones, HughesNet, ETB, Voip, telefonia en la nube, central virtual">
    <h1> <title>{{ config('app.name', 'Contratar Internet') }}</title> </h1>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

</head>
<body>
    <div id="app">

      @yield('content')

      @yield('javascript-layout')
      <!-- View Javascript -->
      @yield('javascript')

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

  
</body>
</html>
