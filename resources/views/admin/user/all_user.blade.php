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
                            <h3 class="box-title">Total User <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Phone')}}</th>
                                        <th>{{__('Role')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->role }}</td>

                                            <td>
                                                @if($user->email_verified_at !== NULL)
                                                    <span class="badge badge-pill badge-success">{{$user->email_verified_at->diffForHumans()}}</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">{{__('Email not verified')}}</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($user->role === 'normal')
                                                    <a href="" class="btn btn-success">{{__('Set admin')}} <i class="fa fa-arrow-up"></i></a>
                                                @else
                                                    <a href="" class="btn btn-danger">{{__('Set normal')}} <i class="fa fa-arrow-down"></i></a>
                                                @endif
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
                <!-- /.end col-12 -->







            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
