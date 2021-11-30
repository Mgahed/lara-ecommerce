<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @auth
                            <li>
                                <a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>{{__('Wishlist')}}</a>
                            </li>
                        @endauth
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>{{__('My Cart')}}</a></li>
                        {{--<li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>--}}
                        @auth
                            <li><a href="{{ route('user.profile') }}"><i
                                        class="icon fa fa-user"></i>{{__('My Account')}}</a></li>
                            <li>
                                <form method="POST" class="mb-3" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <i class="icon fa fa-sign-out"></i>{{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        @else
                            <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>{{__('Login|Register')}}</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span
                                    class="value">{{app()->getLocale()==='en'?'English':'العربية'}} </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (app()->getLocale()==='en')
                                    <li><a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">العربية</a>
                                    </li>
                                @else
                                    <li><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">English</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"><a href="{{url('/')}}"> <img src="{{asset('front/assets/images/logo.png')}}"
                                                                   alt="logo"> </a></div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                            href="category.html">{{__('Categories')}} <b
                                                class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="{{__('Search here...')}}"/>
                                <a class="search-button" href="#"></a></div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"><a href="#" class="dropdown-toggle lnk-cart"
                                                           data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                <div class="basket-item-count"><span class="count" id="cartQty">0</span></div>
                                <div class="total-price-basket"><span class="lbl">{{__('cart')}} -</span> <span
                                        class="total-price"> <span class="value" id="cartSubTotal">0</span><span
                                            class="sign">{{__('EGP')}}</span></span></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="miniCart">

                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix cart-total">
                                    <div class="{{--pull-right--}} text-center"><span
                                            class="text">{{__('Total')}} :</span><span class='price' id="cartSubTotal1">0</span>{{__('EGP')}}
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                       class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a></div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div id="navbar" class="header-nav animate-dropdown" style="z-index:2;">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                @php
                    $categories = \App\Models\Category::with('subcategory')->orderBy('name_en', 'ASC')->get();
                @endphp
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="{{Route::is('home')?'active':''}} dropdown yamm-fw"><a
                                        href="{{route('home')}}">{{__('Home')}}</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                            data-toggle="dropdown">{{app()->getLocale() === 'en'?$category->name_en:$category->name_ar}}</a>
                                        <ul class="dropdown-menu pages">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-menu">
                                                            <ul class="links">
                                                                @foreach ($category->subcategory as $subcategory)
                                                                    <li>
                                                                        <a href="home.html">{{app()->getLocale() === 'en'?$subcategory->name_en:$subcategory->name_ar}}</a>
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
                                {{--<li class="dropdown  navbar-right special-menu"><a href="#">Todays offer</a></li>--}}
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
