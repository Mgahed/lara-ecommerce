<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
@php
    $categories = \App\Models\Category::with('subcategory')->orderBy('name_en', 'ASC')->get();
    $special_offer = \App\Models\Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
@endphp
<!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{__('Categories')}}</div>
        <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                @foreach ($categories as $category)
                    @if ($category->subcategory->count())
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
                                                            <a href="{{route('products.by.subcategory',$subcategory->id)}}">{{app()->getLocale() === 'en'?ucfirst($subcategory->name_en):$subcategory->name_ar}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif
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
            <h3 class="section-title">{{__('Special Offer')}}</h3>
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
                                                    <div class="image"><a href="{{route('product.details',$item->id)}}">
                                                            <img
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
                                                            href="{{route('product.details',$item->id)}}">{{app()->getLocale() === 'en'?$item->name_en:$item->name_ar}}</a>
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
