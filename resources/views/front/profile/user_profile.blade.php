@extends('front.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('front.common.user_sidebar')

                <div class="col-md-2">
                </div> <!-- // end col md 2 -->


                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span
                                class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Update Your
                            Profile </h3>

                        <div class="card-body">


                            <form method="post" action="{{ route('user.profile.store') }}"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span> </span></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span> </span></label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone <span> </span></label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>

                                {{--                                <div class="form-group">--}}
                                {{--                                    <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>--}}
                                {{--                                    <input type="file" name="profile_photo_path" class="form-control">--}}
                                {{--                                </div>--}}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>


                            </form>
                        </div>


                    </div>

                </div> <!-- // end col md 6 -->

            </div> <!-- // end row -->

        </div>

    </div>


@endsection
