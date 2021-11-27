@extends('front.main_master')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
            @include('front.common.sidebar')
            <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    @if ($sliders->count())
                        <div id="hero">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                @foreach ($sliders as $slider)
                                    <div class="item"
                                         style="background-image: url({{asset($slider->img)}});">
                                        <div class="container-fluid">
                                            <div class="caption bg-color vertical-center text-left">
                                                <div class="big-text fadeInDown-1"
                                                     style="color:grey;">{{app()->getLocale() === 'en'?$slider->title_en:$slider->title_ar}}</div>
                                                <div class="excerpt fadeInDown-2 hidden-xs">
                                                    <span
                                                        style="color:grey;">{{app()->getLocale() === 'en'?$slider->descp_en:$slider->descp_ar}}</span>
                                                </div>
                                                <div class="button-holder fadeInDown-3"><a
                                                        href="index.php?page=single-product"
                                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                        Now</a></div>
                                            </div>
                                            <!-- /.caption -->
                                        </div>
                                        <!-- /.container-fluid -->
                                    </div>
                                    <!-- /.item -->
                                @endforeach
                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                @endif

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{__('New Products')}}</h3>
                        {{--<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                                  data-toggle="tab">All</a>
                            </li>
                            <li><a data-transition-type="backSlide" href="#smartphone"
                                   data-toggle="tab">Clothing</a>
                            </li>
                            <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a>
                            </li>
                            <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>
                        </ul>--}}
                        <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                         data-item="4{{--{{$products->count()}}--}}">
                                        @foreach ($products as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"><a
                                                                    href="{{route('product.details',$product->id)}}"><img
                                                                        src="{{asset($product->thumbnail)}}"
                                                                        alt="{{$product->name_en}}"></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @if ($product->discount_price != NULL)
                                                                @php
                                                                    $amount = $product->sell_price-$product->discount_price;
                                                                    $percentage = ($amount/$product->sell_price) * 100;
                                                                @endphp
                                                                <div class="tag new">
                                                                    <span>{{round($percentage)}}%</span></div>
                                                            @else
                                                                <div class="tag new"><span>{{__('new')}}</span></div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{route('product.details',$product->id)}}">
                                                                    @if (app()->getLocale() === 'en')
                                                                        {{$product->name_en}}
                                                                    @else
                                                                        {{$product->name_ar}}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            {{--<div class="rating rateit-small"></div>--}}
                                                            <div class="description">
                                                                @if (app()->getLocale() === 'en')
                                                                    {{Str::limit($product->short_descp_en, 20, $end='.......')}}
                                                                @else
                                                                    {{Str::limit($product->short_descp_ar, 20, $end='.......')}}
                                                                @endif
                                                            </div>
                                                            @if ($product->discount_price != NULL)
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->discount_price}}{{__('EGP')}} </span>
                                                                    <span
                                                                        class="price-before-discount">{{$product->sell_price}}{{__('EGP')}}</span>
                                                                </div>
                                                            @else
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->sell_price}}{{__('EGP')}} </span>
                                                                </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                                type="button"
                                                                                data-toggle="modal"
                                                                                data-target="#add_to_cart"
                                                                                onclick="productView({{$product->id}})"
                                                                                title="{{__('Add Cart')}}"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                                type="button">
                                                                            Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <li class="lnk wishlist"><a data-toggle="tooltip"
                                                                                                class="add-to-cart"
                                                                                                href="detail.html"
                                                                                                title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a></li>
                                                                    <li class="lnk"><a data-toggle="tooltip"
                                                                                       class="add-to-cart"
                                                                                       href="detail.html"
                                                                                       title="Compare">
                                                                            <i
                                                                                class="fa fa-signal"
                                                                                aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->

                    <!-- ============================================== SKIPPED PRODUCT 0 ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{app()->getLocale() === 'en' ? $skip_category_0->name_en : $skip_category_0->name_ar}}</h3>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                         data-item="4">
                                        @foreach ($skip_product_0 as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"><a
                                                                    href="{{route('product.details',$product->id)}}"><img
                                                                        src="{{asset($product->thumbnail)}}"
                                                                        alt="{{$product->name_en}}"></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @if ($product->discount_price != NULL)
                                                                @php
                                                                    $amount = $product->sell_price-$product->discount_price;
                                                                    $percentage = ($amount/$product->sell_price) * 100;
                                                                @endphp
                                                                <div class="tag hot">
                                                                    <span>{{round($percentage)}}%</span></div>
                                                            @else
                                                                {{--<div class="tag hot"><span>{{__('new')}}</span></div>--}}
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{route('product.details',$product->id)}}">
                                                                    @if (app()->getLocale() === 'en')
                                                                        {{$product->name_en}}
                                                                    @else
                                                                        {{$product->name_ar}}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            {{--<div class="rating rateit-small"></div>--}}
                                                            <div class="description">
                                                                @if (app()->getLocale() === 'en')
                                                                    {{Str::limit($product->short_descp_en, 20, $end='.......')}}
                                                                @else
                                                                    {{Str::limit($product->short_descp_ar, 20, $end='.......')}}
                                                                @endif
                                                            </div>
                                                            @if ($product->discount_price != NULL)
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->discount_price}}{{__('EGP')}} </span>
                                                                    <span
                                                                        class="price-before-discount">{{$product->sell_price}}{{__('EGP')}}</span>
                                                                </div>
                                                            @else
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->sell_price}}{{__('EGP')}} </span>
                                                                </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="modal"
                                                                                data-target="#add_to_cart"
                                                                                onclick="productView({{$product->id}})"
                                                                                class="btn btn-primary icon"
                                                                                type="button"
                                                                                title="{{__('Add Cart')}}"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                                type="button">
                                                                            Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <li class="lnk wishlist"><a data-toggle="tooltip"
                                                                                                class="add-to-cart"
                                                                                                href="detail.html"
                                                                                                title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a></li>
                                                                    <li class="lnk"><a data-toggle="tooltip"
                                                                                       class="add-to-cart"
                                                                                       href="detail.html"
                                                                                       title="Compare">
                                                                            <i
                                                                                class="fa fa-signal"
                                                                                aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- ============================================== SKIPPED PRODUCT 0 : END ============================================== -->

                    <!-- ============================================== SKIPPED PRODUCT 1 ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{app()->getLocale() === 'en' ? $skip_category_1->name_en : $skip_category_1->name_ar}}</h3>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                         data-item="4">
                                        @foreach ($skip_product_1 as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"><a
                                                                    href="{{route('product.details',$product->id)}}"><img
                                                                        src="{{asset($product->thumbnail)}}"
                                                                        alt="{{$product->name_en}}"></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @if ($product->discount_price != NULL)
                                                                @php
                                                                    $amount = $product->sell_price-$product->discount_price;
                                                                    $percentage = ($amount/$product->sell_price) * 100;
                                                                @endphp
                                                                <div class="tag hot">
                                                                    <span>{{round($percentage)}}%</span></div>
                                                            @else
                                                                {{--<div class="tag hot"><span>{{__('new')}}</span></div>--}}
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{route('product.details',$product->id)}}">
                                                                    @if (app()->getLocale() === 'en')
                                                                        {{$product->name_en}}
                                                                    @else
                                                                        {{$product->name_ar}}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            {{--<div class="rating rateit-small"></div>--}}
                                                            <div class="description">
                                                                @if (app()->getLocale() === 'en')
                                                                    {{Str::limit($product->short_descp_en, 20, $end='.......')}}
                                                                @else
                                                                    {{Str::limit($product->short_descp_ar, 20, $end='.......')}}
                                                                @endif
                                                            </div>
                                                            @if ($product->discount_price != NULL)
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->discount_price}}{{__('EGP')}} </span>
                                                                    <span
                                                                        class="price-before-discount">{{$product->sell_price}}{{__('EGP')}}</span>
                                                                </div>
                                                            @else
                                                                <div class="product-price"><span
                                                                        class="price"> {{$product->sell_price}}{{__('EGP')}} </span>
                                                                </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="modal"
                                                                                data-target="#add_to_cart"
                                                                                onclick="productView({{$product->id}})"
                                                                                class="btn btn-primary icon"
                                                                                type="button"
                                                                                title="{{__('Add Cart')}}"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                                type="button">
                                                                            Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <li class="lnk wishlist"><a data-toggle="tooltip"
                                                                                                class="add-to-cart"
                                                                                                href="detail.html"
                                                                                                title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a></li>
                                                                    <li class="lnk"><a data-toggle="tooltip"
                                                                                       class="add-to-cart"
                                                                                       href="detail.html"
                                                                                       title="Compare">
                                                                            <i
                                                                                class="fa fa-signal"
                                                                                aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- ============================================== SKIPPED PRODUCT 1 : END ============================================== -->

                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15"><a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand1.png"
                                    src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item m-t-10"><a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand2.png"
                                    src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->

            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
@endsection
