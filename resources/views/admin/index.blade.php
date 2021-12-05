@extends('admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">New Customers</p>
                                    <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +2.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Sold Cars</p>
                                    <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +2.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-info-light rounded w-60 h-60">
                                    <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Sales Lost</p>
                                    <h3 class="text-white mb-0 font-weight-500">$1,250 <small class="text-danger"><i
                                                class="fa fa-caret-down"></i> -0.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-danger-light rounded w-60 h-60">
                                    <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Inbound Call</p>
                                    <h3 class="text-white mb-0 font-weight-500">1,460 <small class="text-danger"><i
                                                class="fa fa-caret-up"></i> -1.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-success-light rounded w-60 h-60">
                                    <i class="text-success mr-0 font-size-24 mdi mdi-phone-outgoing"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Outbound Call</p>
                                    <h3 class="text-white mb-0 font-weight-500">1,700 <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +0.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-light rounded w-60 h-60">
                                    <i class="text-white mr-0 font-size-24 mdi mdi-chart-line"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Total Revune</p>
                                    <h3 class="text-white mb-0 font-weight-500">$4,500k <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +2.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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
