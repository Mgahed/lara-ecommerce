@extends('front.main_master')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    @if ($carts->count())
                                        <th style="font-size: 16px !important;"
                                            class="heading-title">{{__('Image')}}</th>
                                        <th style="font-size: 16px !important;"
                                            class="heading-title">{{__('Product name')}}</th>
                                        <th style="font-size: 16px !important;"
                                            class="heading-title">{{__('Color')}}</th>
                                        <th style="font-size: 16px !important;"
                                            class="heading-title">{{__('Total')}}</th>
                                        <th style="font-size: 16px !important;"
                                            class="heading-title">{{__('Remove')}}</th>
                                    @else
                                        <th colspan="4" class="heading-title">{{__('My Cart')}}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @if ($carts->count())
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="col-md-2"><img style="width: 60px !important;" height="60px;"
                                                                      src="{{asset($cart->options->image)}}"
                                                                      alt="{{$cart->name}}">
                                            </td>
                                            <td class="col-md-3">
                                                <div class="product-name"><a
                                                        href="{{route('product.details',$cart->options->product_id)}}">{{$cart->name}}</a>
                                                </div>
                                                {{-- <div class="rating">
                                                     <i class="fa fa-star rate"></i>
                                                     <i class="fa fa-star rate"></i>
                                                     <i class="fa fa-star rate"></i>
                                                     <i class="fa fa-star rate"></i>
                                                     <i class="fa fa-star non-rate"></i>
                                                     <span class="review">( 06 Reviews )</span>
                                                 </div>--}}
                                                <div class="price">
                                                    {{$cart->price}}{{__('EGP')}} * {{$cart->qty}}
                                                </div>
                                            </td>
                                            <td class="col-md-3">
                                                <strong>{{$cart->options->color}}</strong>
                                            </td>
                                            <td class="col-md-3">
                                                <strong>{{$cart->subtotal}}{{__('EGP')}}</strong>
                                            </td>
                                            <td class="col-md-1 close-btn">
                                                <a href="{{route('remove.mycart',$cart->rowId)}}" class=""><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <h3 class="text-danger text-center">{{__('No items in cart')}}</h3>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <br><br>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection