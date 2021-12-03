@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong></h4>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table">
                                <tr>
                                    <th> Shipping Name :</th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Phone :</th>
                                    <th> {{ $order->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Email :</th>
                                    <th> {{ $order->email }} </th>
                                </tr>

                                <tr>
                                    <th> Address :</th>
                                    <th> {{ $order->division->name_en }}, {{$order->address}} </th>
                                </tr>

                                <tr>
                                    <th> Order Date :</th>
                                    <th> {{ $order->created_at }} </th>
                                </tr>

                            </table>

                        </div>

                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong><span
                                    class="text-danger"> Invoice : {{ $order->invoice_number }}</span></h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th> Name :</th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>

                                <tr>
                                    <th> Phone :</th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Payment Type :</th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>

                                <tr>
                                    <th> Invoice :</th>
                                    <th class="text-danger"> {{ $order->invoice_number }} </th>
                                </tr>

                                <tr>
                                    <th> Order Total :</th>
                                    <th>{{ $order->amount }}{{__('EGP')}} </th>
                                </tr>

                                <tr>
                                    <th> Order :</th>
                                    <th>
                                    <span class="badge badge-pill badge-warning"
                                          style="background: #418DB9;">{{ __($order->status) }} </span></th>
                                </tr>


                                <tr>
                                    <th></th>
                                    <th>
                                        @if($order->status === 'pending')
                                            <a href="{{ route('pending-confirm',$order->id) }}"
                                               class="btn btn-block btn-success"
                                               id="confirm">{{__('Confirm Order')}}</a>
                                            <br>
                                            <a href="{{ route('cancel-by-admin',$order->id) }}"
                                               class="btn btn-block btn-danger" id="cancel">{{__('Cancel Order')}}</a>

                                        @elseif($order->status === 'confirm')
                                            <a href="{{ route('confirm.processing',$order->id) }}"
                                               class="btn btn-block btn-success"
                                               id="processing">{{__('Processing Order')}}</a>

                                        @elseif($order->status === 'processing')
                                            <a href="{{ route('processing.picked',$order->id) }}"
                                               class="btn btn-block btn-success" id="picked">{{__('Picked Order')}}</a>

                                        @elseif($order->status === 'picked')
                                            <a href="{{ route('picked.shipped',$order->id) }}"
                                               class="btn btn-block btn-success"
                                               id="shipped">{{__('Shipped Order')}}</a>

                                        @elseif($order->status === 'shipped')
                                            <a href="{{ route('shipped.delivered',$order->id) }}"
                                               class="btn btn-block btn-success"
                                               id="delivered">{{__('Delivered Order')}}</a>
                                        @elseif ($order->status === 'return requested')
                                            <a href="{{ route('return.done',$order->id) }}" class="btn btn-success">
                                                {{__('Confirm return')}}
                                            </a>
                                        @endif

                                    </th>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">

                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr>
                                    <td width="10%">
                                        <label for=""> Image</label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Code</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>


                                @foreach($orderItem as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img src="{{ asset($item->product->thumbnail) }}"
                                                               height="50px;"
                                                               width="50px;"> </label>
                                        </td>

                                        <td width="20%">
                                            <label for=""> {{ $item->product->name_en }}</label>
                                        </td>


                                        <td width="10%">
                                            <label for=""> {{ $item->product->code }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->price }}{{__('EGP')}}
                                                ( {{ $item->price * $item->qty}}{{__('EGP')}} ) </label>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>  <!--  // cod md -12 -->
            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
