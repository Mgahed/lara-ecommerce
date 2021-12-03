@extends('front.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('front.common.user_sidebar')

                <div class="col-md-2">
                </div>

                <div class="col-md-8">

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for=""> Date</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> Total</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> Payment</label>
                                </td>


                                <td class="col-md-2">
                                    <label for=""> Invoice</label>
                                </td>

                                <td class="col-md-2">
                                    <label for=""> Order</label>
                                </td>


                            </tr>


                            @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> {{ $order->created_at }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> {{ $order->amount }}{{__('EGP')}}</label>
                                    </td>


                                    <td class="col-md-3">
                                        <label for=""> {{ $order->payment_method }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->invoice_number }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                                        </label>
                                    </td>

                                </tr>

                            @endforeach





                            </tbody>

                        </table>

                    </div>


                </div> <!-- / end col md 8 -->


            </div> <!-- // end row -->

        </div>

    </div>


@endsection
