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
                                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"><span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span></div>
                                <div class="media-body">
                                    <p>+(888) 123-4567<br>
                                        +(888) 456-7890</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"><span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span></div>
                                <div class="media-body"><span><a href="mailto:mrtechnawy@gmail.com">mrtechnawy@gmail.com</a></span></div>
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

                {{--<div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Company">Company</a></li>
                            <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                            <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>--}}
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a>
                    </li>
                    <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                    <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a>
                    </li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
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
                    &copy; {{\Carbon\Carbon::now()->year}} {{__('Made by')}} <a target="_blank" href="https://mrtechnawy.com">Mr Technawy</a> {{__('All Rights Reserved.')}}
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
