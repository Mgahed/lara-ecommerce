<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">{{__('Contact us')}}</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"><span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span></div>
                                <div class="media-body">
                                    <a href="https://maps.app.goo.gl/iho5mpCiBaWkRSF79"><p>االجيزة, الشيخ زايد, نافورة الافق</p></a>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"><span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span></div>
                                <div class="media-body">
                                    <a href="tel:+201095226151"><p>00201095226151</p></a>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"><span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span></div>
                                <div class="media-body"><span><a
                                            href="mailto:mrtechnawy@gmail.com">mrtechnawy@gmail.com</a></span></div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">{{__('User pages')}}</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{ route('user.profile') }}">{{__('My Account')}}</a></li>
                            <li><a href="{{ route('my.orders') }}">{{__('Order History')}}</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">{{__('Why us')}}</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#">{{__('About us')}}</a></li>
                            <li><a href="{{route('contact-us')}}">{{__('Contact us')}}</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">{{__('Download our app')}}</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        {{--<ul class='list-unstyled'>
                            --}}{{--<li class="first">
                                <div class="page-content page-container" id="page-content">
                                    <div class="padding">
                                        <div class="row container d-flex justify-content-center">
                                            <div class="template-demo mt-2">
                                                <button class="btn btn-outline-dark btn-icon-text"><i
                                                        class="fa fa-apple btn-icon-prepend mdi-36px"></i> <span
                                                        class="d-inline-block text-left"> <small
                                                            class="font-weight-light d-block">Available on the</small> App Store </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <br>--}}{{--
                            <li class="first">--}}
                                <!-- Google Play button -->
                                <a href="{{asset('Mobile_Care.apk')}}"><img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" width="150" height="60" alt="Get it on Google Play" border="0"></a>
                            {{--</li>
                        </ul>--}}
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="whatsapp pull-left"><a target="_blank" rel="nofollow" href="https://wa.me/+201095226151" title="Whatsapp"></a></li>
                    <li class="instagram pull-left"><a target="_blank" rel="nofollow" href="https://www.instagram.com/storemobilecare/" title="Instagram"></a>
                    </li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods" style="color: aliceblue;">
                    {{--<ul>
                        <li><img src="--}}{{--assets/images/payments/1.png--}}{{--" alt=""></li>
                        <li><img src="--}}{{--assets/images/payments/2.png--}}{{--" alt=""></li>
                        <li><img src="--}}{{--assets/images/payments/3.png--}}{{--" alt=""></li>
                        <li><img src="--}}{{--assets/images/payments/4.png--}}{{--" alt=""></li>
                        <li><img src="--}}{{--assets/images/payments/5.png--}}{{--" alt=""></li>
                    </ul>--}}
                    &copy; {{\Carbon\Carbon::now()->year}} {{__('Made by')}} <a target="_blank"
                                                                                href="https://mrtechnawy.com">Mr
                        Technawy</a> {{__('All Rights Reserved.')}}
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
