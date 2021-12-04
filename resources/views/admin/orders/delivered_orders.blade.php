@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{__('Delivered Orders List')}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Invoice')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Payment')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td> {{ $item->created_at }}  </td>
                                            <td> {{ $item->invoice_number }}  </td>
                                            <td> {{ $item->amount }}{{__('EGP')}}  </td>

                                            <td> {{ $item->payment_method }}  </td>
                                            <td> <span class="badge badge-pill badge-primary">{{ __($item->status) }} </span>  </td>

                                            <td width="25%">
                                                <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->






            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection