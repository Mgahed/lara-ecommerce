<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
@php
    $categories = \App\Models\Category::with('subcategory')->orderBy('name_en', 'ASC')->get();
    $special_offer = \App\Models\Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
    $best_seller = \App\Models\Product::where('best_seller', 1)->orderBy('id', 'DESC')->limit(6)->get();
@endphp
<!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs my-d-none my-d-sm-block">
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
    <!-- ============================================== best_seller ============================================== -->
    @if ($best_seller->count())
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">{{__('Best Seller')}}</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div
                    class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    @foreach ($best_seller as $item)
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
    <!-- ============================================== best_seller : END ============================================== -->

<!-- ============================================== Testimonials: END ============================================== -->

    {{--<div class="home-banner"><img src="{{asset('front/assets/images/banners/LHS-banner.jpg')}}"
                                  alt="Image"></div>--}}
</div>
<!-- /.sidemenu-holder -->
<!-- ============================================== SIDEBAR : END ============================================== -->
