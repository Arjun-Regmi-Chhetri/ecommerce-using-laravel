@extends('layouts.back')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="header">
        <div class="container my-2">
            <div class="text">
                <h3 class="fs-5">Welcome back, Person A !</h3>
                <p class="textP">You have 24 message and 5 notification</p>
            </div>
        </div>
    </div>
<div class="dashboardDefault">
    <div class="container-fluid my-5">
        <div class="row">
            <div class=" col-md-12 col-lg-6">
                <div class="row">
                    <div class="col">
                        <div class="card profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Customers</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">64</h1>
                                <div class="mb-0">
                                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 2.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Orders</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="bi bi-cart-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">64</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Revenue</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">64</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Growth</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="bi bi-currency-exchange"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">64</h1>
                                <div class="mb-0">
                                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class=" col-md-12 col-lg-6">
                <div class="card flex-fill w-100 profile mh-100">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line" style="display: block; height: 277px; width: 295px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-3">

            <div class="col-lg-6 col-md-12">
                <div class="card flex-fill w-100 profile ">
                    <div class="card-header  bg-transparent border-0">
                        <h5 class="card-title mb-0">Real-Time</h5>
                    </div>
                    <div class="card-body position-relative">
                        <div id="world_map" style="height: 350px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card flex-fill profile">
                    <div class="card-header  bg-transparent border-0">
                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="card flex-fill  w-100 profile" style="height: 95%">
                    <div class="card-header bg-transparent border-0">

                        <h5 class="card-title mb-0">Browser Usage</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>

                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>Chrome</td>
                                    <td class="text-end">4306</td>
                                </tr>
                                <tr>
                                    <td>Firefox</td>
                                    <td class="text-end">3801</td>
                                </tr>
                                <tr>
                                    <td>IE</td>
                                    <td class="text-end">1689</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
