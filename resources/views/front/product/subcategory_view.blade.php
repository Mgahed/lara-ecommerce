@extends('front.main_master')
@section('content')

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                @include('front.common.sidebar')
                <div class='col-xs-12 col-sm-12 col-md-9 homebanner-holder'>

                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"><a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a></li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"><span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                        class="btn dropdown-toggle"> Position <span
                                                        class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                {{--<div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"><span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                        class="btn dropdown-toggle"> 1 <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>--}}
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {{$products->links()}}
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container --> </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"><a
                                                                    href="{{route('product.details',$product->id)}}"><img
                                                                        src="{{asset($product->thumbnail)}}" alt=""></a>
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
                                                            <div class="rating rateit-small"></div>
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
                                                                                data-toggle="dropdown" type="button"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                                type="button">Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <li class="lnk wishlist"><a class="add-to-cart"
                                                                                                href="detail.html"
                                                                                                title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a></li>
                                                                    <li class="lnk"><a class="add-to-cart"
                                                                                       href="detail.html"
                                                                                       title="Compare">
                                                                            <i class="fa fa-signal"></i> </a></li>
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
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @foreach ($products as $product)
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"><img
                                                                        src="{{asset($product->thumbnail)}}"
                                                                        alt="{{$product->name_en}}"></div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{route('product.details',$product->id)}}">
                                                                        @if (app()->getLocale() === 'en')
                                                                            {{$product->name_en}}
                                                                        @else
                                                                            {{$product->name_ar}}
                                                                        @endif
                                                                    </a></h3>
                                                                <div class="rating rateit-small"></div>
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
                                                                <div class="description m-t-10">
                                                                    @if (app()->getLocale() === 'en')
                                                                        {{$product->short_descp_en}}
                                                                    @else
                                                                        {{$product->short_descp_ar}}
                                                                    @endif
                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                        data-toggle="dropdown"
                                                                                        type="button"><i
                                                                                        class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn"
                                                                                        type="button">Add to cart
                                                                                </button>
                                                                            </li>
                                                                            <li class="lnk wishlist"><a
                                                                                    class="add-to-cart"
                                                                                    href="detail.html"
                                                                                    title="Wishlist"> <i
                                                                                        class="icon fa fa-heart"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lnk"><a class="add-to-cart"
                                                                                               href="detail.html"
                                                                                               title="Compare"> <i
                                                                                        class="fa fa-signal"></i> </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    @if ($product->discount_price != NULL)
                                                        @php
                                                            $amount = $product->sell_price-$product->discount_price;
                                                            $percentage = ($amount/$product->sell_price) * 100;
                                                        @endphp
                                                        <div class="tag new"><span>{{round($percentage)}}%</span></div>
                                                    @else
                                                        {{--<div class="tag new"><span>{{__('new')}}</span></div>--}}
                                                    @endif
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.category-product-inner -->
                                    @endforeach

                                    {{--<div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"><img src="assets/images/products/p4.jpg"
                                                                                    alt=""></div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span> <span
                                                                    class="price-before-discount">$ 800</span></div>
                                                            <!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon"
                                                                                    data-toggle="dropdown"
                                                                                    type="button"><i
                                                                                    class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                    type="button">Add to cart
                                                                            </button>
                                                                        </li>
                                                                        <li class="lnk wishlist"><a class="add-to-cart"
                                                                                                    href="detail.html"
                                                                                                    title="Wishlist"> <i
                                                                                    class="icon fa fa-heart"></i> </a>
                                                                        </li>
                                                                        <li class="lnk"><a class="add-to-cart"
                                                                                           href="detail.html"
                                                                                           title="Compare"> <i
                                                                                    class="fa fa-signal"></i> </a></li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
                                                <div class="tag sale"><span>sale</span></div>
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.category-product-inner -->--}}

                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {{$products->links()}}
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container --> </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
            </div>
        </div>
        <br><br>
    </div>

    <script>
        function loadmoreProduct(page) {
            $.ajax({
                type: "get",
                url: "?page=" + page,
                beforeSend: function (response) {
                    $('.ajax-loadmore-product').show();
                }
            })
                .done(function (data) {
                    if (data.grid_view == " " || data.list_view == " ") {
                        return;
                    }
                    $('.ajax-loadmore-product').hide();
                    $('#grid_view_product').append(data.grid_view);
                    $('#list_view_product').append(data.list_view);
                })
                .fail(function () {
                    alert('Something Went Wrong');
                })
        }

        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadmoreProduct(page);
            }
        });
    </script>

@endsection
