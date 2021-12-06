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
                            <h3 class="box-title">{{__('Product List')}} <span
                                    class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('Image')}}</th>
                                        <th>{{__('Product Code')}}</th>
                                        <th>{{__('Product name')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('Quantity')}}</th>
                                        <th>{{__('Discount')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td><img src="{{ asset($item->thumbnail) }}"
                                                     style="width: 60px; height: 50px;"></td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name_en }} - {{ $item->name_ar }}</td>
                                            <td>{{ $item->sell_price }} EGP</td>
                                            <td>{{ $item->quantity }}</td>

                                            <td>
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>
                                                @else
                                                    @php
                                                        $amount = $item->sell_price - $item->discount_price;
                                                        $discount = ($amount/$item->sell_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

                                                @endif


                                            </td>


                                            <td width="30%">
                                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary"
                                                   title="Product Details Data"><i class="fa fa-eye"></i> </a>

                                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info"
                                                   title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                                <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger"
                                                   title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>


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
