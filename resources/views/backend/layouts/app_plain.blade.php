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
<!--===============================================================================================-->	
	{{-- <link rel="icon" type="image/png" href="{{asset('frontend/images/icons/favicon.ico')}}"/> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

   
</body>
 <!--===============================================================================================-->
 <script src="{{asset('frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/vendor/animsition/js/animsition.min.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/vendor/bootstrap/js/popper.js')}}"></script>
     <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/vendor/select2/select2.min.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/vendor/daterangepicker/moment.min.js')}}"></script>
     <script src="{{asset('frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/vendor/countdowntime/countdowntime.js')}}"></script>
 <!--===============================================================================================-->
     <script src="{{asset('frontend/js/main.js')}}"></script>
</html>
