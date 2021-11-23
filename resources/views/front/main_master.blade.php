<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale() === 'en' ? 'ltr' : 'rtl'}}">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>{{ config('app.name', 'Mr Technawy Ecommerce') }}</title>
@if (app()->getLocale() === 'en')
    <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

        <!-- Customizable CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/blue.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.transitions.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rateit.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-select.min.css')}}">

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="{{asset('front/assets/css/font-awesome.css')}}">
@else
    <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_bootstrap.css')}}">

        <!-- Customizable CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_main.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/blue.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_owl.transitions.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_animate.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_rateit.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_bootstrap-select.css')}}">

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_font-awesome.css')}}">
@endif

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    {{-- toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }
    </style>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('front.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('front.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('front/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
@if (app()->getLocale() === 'en')
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
@else
    <script src="{{asset('front/assets/js/rtl_owl.carousel.js')}}"></script>
@endif
<script src="{{asset('front/assets/js/echo.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front/assets/js/wow.min.js')}}"></script>
<script src="{{asset('front/assets/js/scripts.js')}}"></script>
<script>
    window.onscroll = function () {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>

{{-- toaster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}")
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}")
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}")
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}")
            break;
    }
    @endif
</script>

</body>
</html>
