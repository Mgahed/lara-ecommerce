@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
    @php
        $users = \App\Models\User::where('role','normal')->count();
        $revenue = \App\Models\Order::where('status','delivered')->whereYear('updated_at',\Carbon\Carbon::now()->year)->sum('amount');
        $orders = \App\Models\Order::where('status','delivered')->whereYear('updated_at',\Carbon\Carbon::now()->year)->count();
        $products = \App\Models\Product::all()->count();

    @endphp
    <!-- Main content -->
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up text-center">
                            <div class="box-body">
                                <center>
                                    <div class="icon bg-primary-light rounded w-60 h-60">
                                        <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                    </div>
                                </center>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">{{__('Customers')}}</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$users}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up text-center">
                            <div class="box-body">
                                <center>
                                    <div class="icon bg-light rounded w-60 h-60">
                                        <i class="text-white mr-0 font-size-24 mdi mdi-chart-line"></i>
                                    </div>
                                </center>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">{{__('This Year Revenue')}}</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$revenue}}{{__('EGP')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up text-center">
                            <div class="box-body">
                                <center>
                                    <div class="icon bg-success-light rounded w-60 h-60">
                                        <i class="text-success mr-0 font-size-24 mdi mdi-cart"></i>
                                    </div>
                                </center>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">{{__('This Year Orders')}}</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$orders}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up text-center">
                            <div class="box-body">
                                <center>
                                    <div class="icon bg-info-light rounded w-60 h-60">
                                        <i class="text-info mr-0 font-size-24 fa fa-shopping-basket"></i>
                                    </div>
                                </center>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Products</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$products}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <h4 class="box-title">{{__('Revenues')}}</h4>
                                <div>
                                    <canvas id="doughnut-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <h4 class="box-title">{{__('Orders')}}</h4>
                                <div>
                                    <canvas id="pie-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </section>
        </div>
        <!-- /.content -->
    </div>
@endsection

<script src="{{asset('admin-dashboard/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>
<script>
    $(document).ready(function () {
        "use strict";
        var ctx6 = document.getElementById("pie-chart").getContext("2d");
        var data6 = {
            labels: [
                "{{__('This month')}}",
                "{{__('Last month')}}",
                "{{__('Two months ago')}}"
            ],
            datasets: [
                {
                    data: [{{$this_month_orders}},{{$last_month_orders}},{{$two_month_orders}}],
                    backgroundColor: [
                        "#689f38",
                        "#38649f",
                        "#389f99"
                    ],
                    hoverBackgroundColor: [
                        "#33691e",
                        "#244674",
                        "#18625e"
                    ]
                }]
        };

        var pieChart = new Chart(ctx6, {
            type: 'pie',
            data: data6,
            options: {
                animation: {
                    duration: 3000
                },
                responsive: true,
                legend: {
                    labels: {
                        fontFamily: "Nunito Sans",
                        fontColor: "#878787"
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(33,33,33,1)',
                    cornerRadius: 0,
                    footerFontFamily: "'Nunito Sans'"
                },
                elements: {
                    arc: {
                        borderWidth: 0
                    }
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        "use strict";
        var ctx7 = document.getElementById("doughnut-chart").getContext("2d");
        var data7 = {
            labels: [
                "{{__('This month')}}",
                "{{__('Last month')}}",
                "{{__('Two months ago')}}"
            ],
            datasets: [
                {
                    data: [{{$this_month}}, {{$last_month}}, {{$two_month}}],
                    backgroundColor: [
                        "#389f99",
                        "#ee1044",
                        "#ff8f00"
                    ],
                    hoverBackgroundColor: [
                        "#18625e",
                        "#b31338",
                        "#c0720f"
                    ]
                }]
        };

        var doughnutChart = new Chart(ctx7, {
            type: 'doughnut',
            data: data7,
            options: {
                animation: {
                    duration: 3000
                },
                responsive: true,
                legend: {
                    labels: {
                        fontFamily: "Nunito Sans",
                        fontColor: "#878787"
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(33,33,33,1)',
                    cornerRadius: 0,
                    footerFontFamily: "'Nunito Sans'"
                },
                elements: {
                    arc: {
                        borderWidth: 0
                    }
                }
            }
        });
    });
</script>
{{--<script src="{{asset('admin-dashboard/js/pages/widget-charts2.js')}}"></script>--}}
