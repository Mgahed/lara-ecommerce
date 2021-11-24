@extends('front.main_master')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                        <nav class="yamm megamenu-horizontal">
                            <ul class="nav">
                                @foreach ($categories as $category)
                                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle"
                                                                      data-toggle="dropdown"
                                                                      aria-hidden="true">{{app()->getLocale() === 'en'?ucfirst($category->name_en):$category->name_ar}}</a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-3">
                                                            <ul class="links list-unstyled">
                                                                @foreach ($category->subcategory as $subcategory)
                                                                    <li>
                                                                        <a href="home.html">{{app()->getLocale() === 'en'?ucfirst($subcategory->name_en):$subcategory->name_ar}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- /.nav -->
                        </nav>
                        <!-- /.megamenu-horizontal -->
                    </div>
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                {{--<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                        <div class="item">
                            <div class="products">
                                <div class="hot-deal-wrapper">
                                    <div class="image"><img src="{{asset('front/assets/images/hot-deals/p25.jpg')}}"
                                                            alt=""></div>
                                    <div class="sale-offer-tag"><span>49%<br>off</span></div>
                                    <div class="timing-wrapper">
                                        <div class="box-wrapper">
                                            <div class="date box"><span class="key">120</span> <span
                                                    class="value">DAYS</span></div>
                                        </div>
                                        <div class="box-wrapper">
                                            <div class="hour box"><span class="key">20</span> <span
                                                    class="value">HRS</span></div>
                                        </div>
                                        <div class="box-wrapper">
                                            <div class="minutes box"><span class="key">36</span> <span
                                                    class="value">MINS</span>
                                            </div>
                                        </div>
                                        <div class="box-wrapper hidden-md">
                                            <div class="seconds box"><span class="key">60</span> <span
                                                    class="value">SEC</span></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.hot-deal-wrapper -->

                                <div class="product-info text-left m-t-20">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price"><span class="price"> $600.00 </span> <span
                                            class="price-before-discount">$800.00</span></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->

                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <div class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button"><i
                                                    class="fa fa-shopping-cart"></i></button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget -->
                </div>--}}
                <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    @if ($special_offer->count())
                        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                            <h3 class="section-title">Special Offer</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div
                                    class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                    @foreach ($special_offer as $item)
                                        <div class="item">
                                            <div class="products special-product">
                                                <div class="product">
                                                    <div class="product-micro">
                                                        <div class="row product-micro-row">
                                                            <div class="col col-xs-5">
                                                                <div class="product-image">
                                                                    <div class="image"><a href="#"> <img
                                                                                src="{{asset($item->thumbnail)}}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                    <!-- /.image -->

                                                                </div>
                                                                <!-- /.product-image -->
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col col-xs-7">
                                                                <div class="product-info">
                                                                    <h3 class="name" style="width:90%;"><a
                                                                            href="#">{{app()->getLocale() === 'en'?$item->name_en:$item->name_ar}}</a>
                                                                    </h3>
                                                                    {{--<div class="rating rateit-small"></div>--}}
                                                                    <div class="product-price"><span
                                                                            class="price"> {{$item->discount_price}}{{__('EGP')}} </span>
                                                                        <br>
                                                                        <span
                                                                            class="price-before-discount">{{$item->sell_price}}{{__('EGP')}}</span>
                                                                    </div>
                                                                    <!-- /.product-price -->

                                                                </div>
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.product-micro-row -->
                                                    </div>
                                                    <!-- /.product-micro -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                    @endif
                <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    {{--<div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list"><a class="item" title="Phone" href="category.html">Phone</a> <a
                                    class="item active" title="Vest" href="category.html">Vest</a> <a class="item"
                                                                                                      title="Smartphone"
                                                                                                      href="category.html">Smartphone</a>
                                <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item"
                                                                                                        title="T-shirt"
                                                                                                        href="category.html">T-shirt</a>
                                <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item"
                                                                                                          title="Sneaker"
                                                                                                          href="category.html">Sneaker</a>
                                <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose"
                                                                                              href="category.html">Rose</a>
                            </div>
                            <!-- /.tag-list -->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>--}}
                <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    {{--<div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Deals</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('front/assets/images/products/p28.jpg')}}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('front/assets/images/products/p15.jpg')}}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"><a href="#"> <img
                                                                        src="{{asset('front/assets/images/products/p26.jpg')}}"
                                                                        alt="image">
                                                                </a></div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>--}}
                <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    {{--<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>--}}
                <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    {{--<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="{{asset('front/assets/images/testimonials/member1.png')}}"
                                                         alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis.
                                    Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span></div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->
                        </div>
                        <!-- /.owl-carousel -->
                    </div>--}}

                <!-- ============================================== Testimonials: END ============================================== -->

                    {{--<div class="home-banner"><img src="{{asset('front/assets/images/banners/LHS-banner.jpg')}}"
                                                  alt="Image"></div>--}}
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

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
                            <h3 class="new-product-title pull-left">New Products</h3>
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
                                         data-item="{{$products->count()}}">
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
                                                                <div class="tag new"><span>{{round($percentage)}}%</span></div>
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
                                                                        <button data-toggle="tooltip"
                                                                                class="btn btn-primary icon"
                                                                                type="button"
                                                                                title="Add Cart"><i
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
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                {{--<div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"><img class="img-responsive"
                                                        src="{{asset('front/assets/images/banners/home-banner1.jpg')}}"
                                                        alt=""></div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"><img class="img-responsive"
                                                        src="{{asset('front/assets/images/banners/home-banner2.jpg')}}"
                                                        alt=""></div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>--}}
                <!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                {{--<section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('front/assets/images/blog-post/post1.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                laudantium</a>
                                        </h3>
                                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('front/assets/images/blog-post/post2.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="assets/images/blog-post/post1.jpg" alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="assets/images/blog-post/post2.jpg" alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="assets/images/blog-post/post1.jpg" alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>--}}
                <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

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
