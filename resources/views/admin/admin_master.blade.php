<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('admin-dashboard/images/favicon.ico')}}">

    <title>{{ config('app.name', 'Mr Technawy Ecommerce') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('admin-dashboard/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('admin-dashboard/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-dashboard/css/skin_color.css')}}">

    {{-- toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

{{-- Header --}}
@include('admin.body.header')

<!-- Left side column. contains the logo and sidebar -->
@include('admin.body.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content here --}}
        @yield('admin')
    </div>
    <!-- /.content-wrapper -->
{{-- footer --}}
@include('admin.body.footer')

<!-- Control Sidebar -->
    <!-- /.control-sidebar -->

    {{--<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>--}}

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{asset('admin-dashboard/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

{{-- data table --}}
<script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('datatable-lang.js')}}"></script>
<script src="{{asset('admin-dashboard/js/pages/data-table.js')}}"></script>

<!-- Sunny Admin App -->
<script src="{{asset('admin-dashboard/js/template.js')}}"></script>
<script src="{{asset('admin-dashboard/js/pages/dashboard.js')}}"></script>

{{-- toaster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    toastr.options = {
        "closeButton": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
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
