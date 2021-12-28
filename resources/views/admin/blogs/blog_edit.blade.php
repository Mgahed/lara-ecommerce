@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">






                <!--   ------------ Edit Slider Page -------- -->


                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{__('Edit Article')}} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $blogs->id }}">
                                    <input type="hidden" name="old_img" value="{{ $blogs->img }}">

                                    <div class="form-group">
                                        <h5>{{__('Title in english')}}</h5>
                                        <div class="controls">
                                            <input type="text" style="direction: ltr;" name="title_en" class="form-control" value="{{ $blogs->title_en }}" >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{__('Title in arabic')}}</h5>
                                        <div class="controls">
                                            <input type="text" style="direction: rtl;" name="title_ar" class="form-control" value="{{ $blogs->title_ar }}" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{__('Description in english')}}</h5>
                                        <div class="controls">
                                            <textarea id="editor1" style="direction: ltr;" name="description_en" class="form-control" rows="10" cols="80" required="">{{$blogs->description_en}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{__('Description in arabic')}}</h5>
                                        <div class="controls">
                                            <textarea id="editor2" style="direction: rtl;" name="description_ar" class="form-control"rows="10" cols="80" required>{{$blogs->description_ar}}</textarea>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>{{__('Image')}}</h5>
                                        <div class="controls">
                                            <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" name="img" class="form-control">
                                            @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{__('Update')}}">
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
