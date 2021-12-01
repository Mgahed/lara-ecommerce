@extends('front.main_master')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="body-content">
                <div class="container">
                    <div class="checkout-box ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel-group checkout-steps" id="accordion">
                                    <!-- checkout-step-01  -->
                                    <div class="panel panel-default checkout-step-01">

                                        <div id="collapseOne" class="panel-collapse collapse in">

                                            <!-- panel-body  -->
                                            <div class="panel-body">
                                                <div class="row">

                                                    <!-- guest-login -->
                                                    <div class="col-md-6 col-sm-6 guest-login">
                                                        <h4 class="checkout-subtitle">Guest or Register Login</h4>
                                                        <p class="text title-tag-line">Register with us for future
                                                            convenience:</p>

                                                        <!-- radio-form  -->
                                                        <form class="register-form" role="form">
                                                            <div class="radio radio-checkout-unicase">
                                                                <input id="guest" type="radio" name="text" value="guest"
                                                                       checked>
                                                                <label class="radio-button guest-check" for="guest">Checkout
                                                                    as
                                                                    Guest</label>
                                                                <br>
                                                                <input id="register" type="radio" name="text"
                                                                       value="register">
                                                                <label class="radio-button"
                                                                       for="register">Register</label>
                                                            </div>
                                                        </form>
                                                        <!-- radio-form  -->

                                                        <h4 class="checkout-subtitle outer-top-vs">Register and save
                                                            time</h4>
                                                        <p class="text title-tag-line ">Register with us for future
                                                            convenience:</p>

                                                        <ul class="text instruction inner-bottom-30">
                                                            <li class="save-time-reg">- Fast and easy check out</li>
                                                            <li>- Easy access to your order history and status</li>
                                                        </ul>

                                                        <button type="submit"
                                                                class="btn-upper btn btn-primary checkout-page-button checkout-continue ">
                                                            Continue
                                                        </button>
                                                    </div>
                                                    <!-- guest-login -->

                                                    <!-- already-registered-login -->
                                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                                        <h4 class="checkout-subtitle">Already registered?</h4>
                                                        <p class="text title-tag-line">Please log in below:</p>
                                                        <form class="register-form" role="form">
                                                            <div class="form-group">
                                                                <label class="info-title" for="exampleInputEmail1">Email
                                                                    Address
                                                                    <span>*</span></label>
                                                                <input type="email"
                                                                       class="form-control unicase-form-control text-input"
                                                                       id="exampleInputEmail1" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="info-title" for="exampleInputPassword1">Password
                                                                    <span>*</span></label>
                                                                <input type="password"
                                                                       class="form-control unicase-form-control text-input"
                                                                       id="exampleInputPassword1" placeholder="">
                                                                <a href="#" class="forgot-password">Forgot your
                                                                    Password?</a>
                                                            </div>
                                                            <button type="submit"
                                                                    class="btn-upper btn btn-primary checkout-page-button">
                                                                Login
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <!-- already-registered-login -->

                                                </div>
                                            </div>
                                            <!-- panel-body  -->

                                        </div><!-- row -->
                                    </div>
                                    <!-- checkout-step-01  -->
                                </div><!-- /.checkout-steps -->
                            </div>
                            <div class="col-md-4">
                                <!-- checkout-progress-sidebar -->
                                <div class="checkout-progress-sidebar ">
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                            </div>
                                            <div>
                                                <ul class="nav nav-checkout-progress list-unstyled">
                                                    @foreach($carts as $item)
                                                        <li>
                                                            <strong>{{__('Image')}}: </strong>
                                                            <img width="50px" height="50px"
                                                                 src="{{asset($item->options->image)}}"
                                                                 alt="{{$item->name}}">
                                                        </li>
                                                        <br>
                                                        <li>
                                                            <span>
                                                                <strong>{{__('Quantity')}}: </strong>
                                                                ( {{$item->qty}} )
                                                            </span>
                                                            <span class="float-right">
                                                                <strong>{{__('Color')}}: </strong>
                                                                {{$item->options->color}}
                                                            </span>
                                                        </li>
                                                        <hr>
                                                    @endforeach
                                                    @if (Session::has('coupon'))
                                                        <li>
                                                            <strong>{{__('Subtotal')}}: </strong> <span>{{$cartTotal}}</span>{{__('EGP')}}
                                                        </li>
                                                        <br>
                                                        <li>
                                                            <strong>{{__('Coupon')}}
                                                                : </strong> {{session()->get('coupon')['coupon_name']}}
                                                        </li>
                                                        <br>
                                                        <li>
                                                            <strong>{{__('Discount')}}
                                                                : </strong> {{session()->get('coupon')['discount_amount']}}{{__('EGP')}}
                                                        </li>
                                                        <br>
                                                        <li>
                                                            <strong>{{__('Grand Total')}}
                                                                : </strong> <span id="cart_total">{{session()->get('coupon')['total_amount']}}</span>{{__('EGP')}}
                                                        </li>
                                                    @else
                                                        <li>
                                                            <strong>{{__('Grand Total')}}: </strong> <span id="cart_total">{{$cartTotal}}</span>{{__('EGP')}}
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- checkout-progress-sidebar -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.checkout-box -->
                </div><!-- /.container -->
            </div><!-- /.body-content -->
        </div>
    </div>
@endsection
