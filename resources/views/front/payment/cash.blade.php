@extends('front.main_master')
@section('content')
    <style>
        .radio_label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .radio_label input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 40%;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">


                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">{{__('Your Shopping Amount')}} </h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">


                                            <hr>
                                            <li>
                                                @php
                                                    $find_city = \App\Models\ShipDivision::select('cost')->findOrFail($data['division_id']);
                                                    $cost_of_shipping = $find_city->cost;
                                                    if($data['district_id'] != null){
                                                        $find_district = \App\Models\District::select('cost')->findOrFail($data['district_id']);
                                                        $cost_of_shipping = $find_district->cost;
                                                    }
                                                    $old_cost_of_shipping = $cost_of_shipping;
                                                    $carts = Cart::content();
                                                    foreach ($carts as $cart) {
                                                        $product = \App\Models\Product::findOrFail($cart->id);
                                                        if($product->free_shipping == null){
                                                            $cost_of_shipping = $old_cost_of_shipping;
                                                            break;
                                                        }else{
                                                            $cost_of_shipping = 0;
                                                        }
                                                    }

                                                    $free_shipping_general = \App\Models\FreeShipping::findOrFail(1);
                                                    if($free_shipping_general->free_shipping_date>=\Carbon\Carbon::today()){
                                                        $cost_of_shipping = 0;
                                                    }
                                                @endphp

                                                @if(Session::has('coupon'))

                                                    <strong>{{__('SubTotal:')}} </strong> {{ $cartTotal }}{{__('EGP')}}
                                                    <hr>

                                                    <strong>{{__('Coupon Name')}}
                                                        : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                                    <hr>

                                                    <strong>{{__('Shipping cost:')}}</strong> {{ $cost_of_shipping }}{{__('EGP')}}
                                                    <hr>

                                                    <strong>{{__('Grand Total:')}} </strong>
                                                    {{ session()->get('coupon')['total_amount'] + $cost_of_shipping }}{{__('EGP')}}
                                                    <hr>


                                                @else

                                                    <strong>{{__('SubTotal:')}} </strong>
                                                    <span>{{ $cartTotal }}{{__('EGP')}}</span>
                                                    <hr>

                                                    <strong>{{__('Shipping cost:')}} </strong>
                                                    <span>{{ $cost_of_shipping }}{{__('EGP')}}</span>
                                                    <hr>

                                                    <strong>{{__('Grand Total:')}} </strong>
                                                    <span>{{ $cartTotal+$cost_of_shipping }}{{__('EGP')}}</span>
                                                    <hr>

                                                @endif

                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div> <!--  // end col md 6 -->


                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">{{__('Payment Method')}}</h4>
                                    </div>

                                    <form action="{{--{{ route('cash.order') }}--}}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">

                                            <label for="cash" style="cursor: pointer;" class="radio_label">
                                                <img src="{{ asset('front/assets/images/payments/cash.png') }}"
                                                     alt="{{__('Cash on delivery')}}" class="img-responsive">
                                                <input type="radio" id="cash" name="select_payment_method"
                                                       style="cursor: pointer;" value="cash" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <br><br>
                                            <label for="card" style="cursor: pointer;" class="radio_label">
                                                <img src="{{ asset('front/assets/images/payments/card.png') }}"
                                                     class="img-responsive"
                                                     alt="{{__('Visa/Master/Meeza')}}" style="width: 500px;">
                                                <input type="radio" id="card" name="select_payment_method"
                                                       style="cursor: pointer;" value="card">
                                                <span class="checkmark"></span>
                                            </label>

                                            <label for="card-element">

                                                <input type="hidden" name="name" value="{{ $data['name'] }}">
                                                <input type="hidden" name="email" value="{{ $data['email'] }}">
                                                <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                                <input type="hidden" name="address" value="{{ $data['address'] }}">
                                                <input type="hidden" name="division_id"
                                                       value="{{ $data['division_id'] }}">
                                                <input type="hidden" name="district_id"
                                                       value="{{ $data['district_id'] }}">
                                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                                <input type="hidden" name="shipping_cost"
                                                       value="{{ $cost_of_shipping }}">

                                            </label>


                                        </div>
                                        <br>
                                        <button class="btn btn-primary">{{__('Submit Payment')}}</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div><!--  // end col md 6 -->

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- === ===== BRANDS CAROUSEL ==== ======== -->


            <!-- ===== == BRANDS CAROUSEL : END === === -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
@section('bottom-script')
    <script>
        $('input[name="select_payment_method"]').click(function () {
            let val = $(this).val();
            if (val === 'cash') {
                let attr = '{{route('cash.order')}}';
                $("#payment-form").attr("action", attr);
            } else if (val === 'card') {
                let attr = '{{route('card.order')}}';
                $("#payment-form").attr("action", attr);
            }
        })
    </script>
@endsection
