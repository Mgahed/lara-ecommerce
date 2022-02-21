@extends('front.main_master')
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="blog-page">

                    <div class="text-right">
                        <div class="pagination-container">
                            <ul class="list-inline list-unstyled">
                                {!! $blogs->links() !!}
                            </ul><!-- /.list-inline -->
                        </div><!-- /.pagination-container -->
                    </div><!-- /.text-right -->
                    <br>

                    <div class='col-xs-12 col-sm-12 col-md-9 homebanner-holder'>
                        @foreach ($blogs as $item)

                            <div class="blog-post wow fadeInUp">
                                <img class="img-responsive" src="{{asset($item->img)}}" alt="">
                                <h1>{{$item->title}}</h1>
                                <span class="date-time"> {{$item->created_at->diffForHumans()}} </span>
                                <br><br>
                                <div class="truncate">
                                    {!! $item->description !!}
                                </div>
                            </div>
                            <br><br>

                        @endforeach

                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                             style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {!! $blogs->links() !!}
                                        {{--<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->
                            </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->
                    </div>
                </div>
                @include('front.common.sidebar')
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('body').bind('cut copy', function (e) {
                    e.preventDefault();
                });
                $("body").on("contextmenu", function(e) {
                    return false;
                });
            });
        </script>
@endsection
