@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!--   ------------ Add SubCategory Page -------- -->


                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{__('Edit SubCategory')}} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('subcategory.update',$subcategory->id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{__('Category Select')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected="" disabled="">{{__('Select Category')}}</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}} >{{ $category->name_en }}
                                                        - {{ $category->name_ar }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{__('Name in English')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" autocomplete="off" style="direction: ltr;" name="name_en" class="form-control"
                                                   value="{{ $subcategory->name_en }}">
                                            @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{__('Name in Arabic')}} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" autocomplete="off" style="direction: rtl;" name="name_ar" class="form-control"
                                                   value="{{ $subcategory->name_ar }}">
                                            @error('name_ar')
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
