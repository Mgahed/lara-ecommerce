@extends('front.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('front.common.user_sidebar')

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Shipping Details</h4></div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Shipping Name:</th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Phone:</th>
                                    <th> {{ $order->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Email:</th>
                                    <th> {{ $order->email }} </th>
                                </tr>

                                <tr>
                                    <th> City :</th>
                                    <th> {{ $order->division->name_en }} </th>
                                </tr>

                                <tr>
                                    <th> Order Date :</th>
                                    <th> {{ $order->created_at }} </th>
                                </tr>

                            </table>


                        </div>

                    </div>

                </div> <!-- // end col md -5 -->


                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Order Details
                                <span class="text-danger"> Invoice : {{ $order->invoice_number }}</span></h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Name:</th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>

                                <tr>
                                    <th> Phone:</th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Payment Type:</th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>

                                <tr>
                                    <th> Invoice:</th>
                                    <th class="text-danger"> {{ $order->invoice_number }} </th>
                                </tr>

                                <tr>
                                    <th> Order Total:</th>
                                    <th>{{ $order->amount }}{{__('EGP')}} </th>
                                </tr>

                                <tr>
                                    <th> Order :</th>
                                    <th>
                                        <span class="badge badge-pill badge-warning"
                                              style="background: #418DB9;">{{ $order->status }} </span></th>
                                </tr>


                            </table>


                        </div>

                    </div>

                </div> <!-- // 2ND end col md -5 -->


                <div class="row">


                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for=""> Image</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td class="col-md-2">
                                        <label for=""> Color </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Price </label>
                                    </td>

                                    {{--<td class="col-md-1">
                                        <label for=""> Download </label>
                                    </td>--}}

                                </tr>


                                @foreach($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->thumbnail) }}"
                                                               height="50px;" width="50px;"> </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->name_en }}</label>
                                        </td>


                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->code }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->price }}{{__('EGP')}}
                                                ({{ $item->price * $item->qty}}{{__('EGP')}}) </label>
                                        </td>
                                        {{--@php
                                            $file = App\Models\Product::where('id',$item->product_id)->first();
                                        @endphp

                                        <td class="col-md-1">
                                            @if($order->status === 'pending')
                                                <strong>
                                                    <span class="badge badge-pill badge-success"
                                                          style="background: #418DB9;"> No File</span> </strong>

                                            @elseif($order->status === 'confirm')

                                                <a target="_blank"
                                                   href="{{ asset('upload/pdf/'.$file->digital_file) }}">
                                                    <strong>
                                                        <span class="badge badge-pill badge-success"
                                                              style="background: #FF0000;"> Download Ready</span>
                                                    </strong> </a>
                                            @endif
                                        </td>--}}

                                    </tr>
                                @endforeach


                                </tbody>

                            </table>

                        </div>


                    </div> <!-- / end col md 8 -->

                </div> <!-- // END ORDER ITEM ROW -->

                @if($order->status !== "delivered" && \Carbon\Carbon::now()->diffInDays($order->dilivered_date)<=7)

                @else

                    @php
                        $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                    @endphp


                    @if($order)
                        <form action="{{ route('return.order',$order->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="label"> Order Return Reason:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05"
                                          placeholder=""></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger">Order Return</button>

                        </form>
                    @else

                        <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this order</span>

                    @endif



                @endif
                <br><br>


            </div> <!-- // end row -->

        </div>

    </div>


@endsection