@extends('front.main_master')
@section('content')


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
                                                @if(Session::has('coupon'))

                                                    <strong>{{__('SubTotal:')}} </strong> {{ $cartTotal }}{{__('EGP')}}
                                                    <hr>

                                                    <strong>{{__('Coupon Name')}}
                                                        : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                                    ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                    <hr>

                                                    <strong>Coupon Discount : </strong>
                                                    {{ session()->get('coupon')['discount_amount'] }}{{__('EGP')}}
                                                    <hr>

                                                    <strong>Grand Total : </strong>
                                                    {{ session()->get('coupon')['total_amount'] }}{{__('EGP')}}
                                                    <hr>


                                                @else

                                                    <strong>{{__('SubTotal:')}} </strong>
                                                    <span>{{ $cartTotal }}{{__('EGP')}}</span>
                                                    <hr>

                                                    @php
                                                        $find_city = \App\Models\ShipDivision::select('cost')->findOrFail($data['division_id']);
                                                        $cost_of_shipping = $find_city->cost;
                                                    @endphp
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

                                    <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">

                                            <img src="{{ asset('front/assets/images/payments/cash.png') }}"
                                                 alt="{{__('Cash on delivery')}}">

                                            <label for="card-element">

                                                <input type="hidden" name="name" value="{{ $data['name'] }}">
                                                <input type="hidden" name="email" value="{{ $data['email'] }}">
                                                <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                                <input type="hidden" name="address" value="{{ $data['address'] }}">
                                                <input type="hidden" name="division_id"
                                                       value="{{ $data['division_id'] }}">
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


                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- === ===== BRANDS CAROUSEL ==== ======== -->


            <!-- ===== == BRANDS CAROUSEL : END === === -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->








@endsection
