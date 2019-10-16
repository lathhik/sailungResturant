
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title')
    </title>
    <meta charset="UTF-8">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <link rel="icon" type="image/png" href="{{asset('custom/frontend/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/vendor/lightbox2/css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/css/main.css')}}">
    <!--===============================================================================================-->
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/css/custom.css')}}">
</head>
<body class="animsition">
