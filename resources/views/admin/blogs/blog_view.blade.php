@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{__('Articles List')}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('Article Image')}} </th>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $item)
                                        <tr>

                                            <td><img src="{{ asset($item->img) }}" style="width: 80px; height: 40px;">
                                            </td>
                                            <td>
                                                @if($item->title_en == NULL)
                                                    <span
                                                        class="badge badge-pill badge-danger"> {{__('No Title')}} </span>
                                                @else
                                                    {{ $item->title_en }} - {{ $item->title_ar }}
                                                @endif
                                            </td>

                                            <td width="30%">
                                                <a href="{{ route('blog.edit',$item->id) }}"
                                                   class="btn btn-info btn-sm" title="Edit Data"><i
                                                        class="fa fa-pencil"></i> </a>

                                                <a href="{{ route('blog.delete',$item->id) }}"
                                                   class="btn btn-danger btn-sm" title="Delete Data" id="delete">
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


                <!--   ------------ Add Blog -------- -->


                <div class="col-md-4">

                    <div class="box">
                        <div class="box-header with-border badge badge-success">
                            <h3 class="box-title" style="color: white;">{{__('Add Article')}} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <h5>{{__('Title in english')}} <span class="text-danger">*</span> </h5>
                                        <div class="controls">
                                            <input type="text" style="direction: ltr;" name="title_en"
                                                   class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{__('Title in arabic')}} <span class="text-danger">*</span> </h5>
                                        <div class="controls">
                                            <input type="text" name="title_ar" style="direction: rtl;"
                                                   class="form-control">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{__('Description in english')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" style="direction: ltr;" name="description_en" class="form-control" rows="10" cols="80" required="">{{old('description_en')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{__('Description in arabic')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" style="direction: rtl;" name="description_ar" class="form-control"rows="10" cols="80" required>{{old('description_ar')}}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{__('Image')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" accept="image/png, image/jpg, image/jpeg"
                                                   name="img" class="form-control" required>
                                            @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                               value="{{__('Add')}}">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
