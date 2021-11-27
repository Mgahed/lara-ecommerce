<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale() === 'en' ? 'ltr' : 'rtl'}}">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
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
        <link rel="stylesheet" href="{{asset('front/assets/css/rtl_blue.css')}}">
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

{{----- Add to cart modal -----}}
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="add_to_cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span style="font-weight: bold;" id="pname"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="" id="pimage" class="card-img-top" alt="{{__('Product')}}" height="170px"
                                 width="100%">
                            <br><br>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">{{__('Price')}}:
                                <span style="font-weight: bold;" class="text-danger" id="pprice"></span>
                                <del style="font-weight: bold;" id="poldprice"></del>
                            </li>
                            <li class="list-group-item">{{__('Brand')}}: <span style="font-weight: bold;"
                                                                               id="pbrand"></span></li>
                            <li class="list-group-item">{{__('Stock')}}: <span style="font-weight: bold;"
                                                                               id="pstock"></span></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="select_color">{{__('Select color')}}</label>
                            <select class="form-control" id="select_color" name="color">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{__('Quantity')}}</label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1" name="quantity"
                                   autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Add to cart')}}</button>
            </div>
        </div>
    </div>
</div>
{{----- End Add to cart modal -----}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function productView(id) {
        $.ajax({
            type: 'GET',
            url: 'product/view/modal/' + id,
            dataType: 'json',
            success: function (data) {
                /*console.log(data)*/
                $('#pname').text(data.product.name_{{app()->getLocale()}})
                if (data.product.discount_price !== null) {
                    $('#pprice').text(data.product.discount_price)
                    $('#poldprice').text(data.product.sell_price)
                } else {
                    $('#pprice').text(data.product.sell_price)
                    $('#poldprice').text('')
                }
                $('#pbrand').text(data.product.brand)

                let quan = data.product.quantity
                if (quan > 0) {
                    $('#pstock').text('{{__('In stock')}}')
                    $('#pstock').removeClass('badge badge-danger')
                    $('#pstock').addClass('badge badge-success')
                } else {
                    $('#pstock').text('{{__('Not available')}}')
                    $('#pstock').removeClass('badge badge-success')
                    $('#pstock').addClass('badge badge-danger')
                }

                $('#pimage').attr('src', '/' + data.product.thumbnail)

                $('select[name="color"]').empty();
                $.each(data.color, function (key, value) {
                    $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>')
                })
            }
        })
    }
</script>
</body>
</html>
