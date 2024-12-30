@extends('admin.master')
@section('admin')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->
    <section class="container-fluid">

        <!-- Page Title-->
        <h2 class="fs-3 fw-bold mb-2">Welcome back, {{ Auth::user()->name }} 👋</h2>
        <p class="text-muted mb-5">Get a quick overview of your company's current status below, or click into one of the
            sections for a more detailed breakdown.</p>
        <!-- / Page Title-->

        <!-- Top Row Widgets-->
        <div class="row g-4">

            <!-- Number Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Monthly Income
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 567,99
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartMonthlyIncome"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 10.2%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Orders Widget-->

            <!-- Average Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Average Order
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 193,99
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartAvgOrders"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-danger-faded text-danger rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                    <polyline points="17 18 23 18 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-danger fs-9 ms-2">- 23.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Average Orders Widget-->

            <!-- Pageviews Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Daily Pageviews
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold">95,456</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartPageviews"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 1.1%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Pageviews Widget-->

            <!-- Number Refunds Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Refund Issued
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span> 12,340
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartNumRefunds"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span
                                class="f-w-7 f-h-7 p-2 bg-success-faded text-success rounded-circle d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-100">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span>
                            <span class="fw-bold text-success fs-9 ms-2">+ 7.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Refunds Widget-->


            <!-- Current Sales-->
            <div class="col-12 col-xxl-4">
                <div class="card mb-4 h-100">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Current Sales</h6>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i>
                            </button>
                            <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-4 mt-2">
                            <div class="d-flex align-items-center">
                                <h4 class="fs-3 fw-bold mb-0 me-3">$123,668</h4>
                                <span class="badge bg-success-faded text-success d-flex align-items-center ">
                                    <span class="f-w-4 d-block me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-100">
                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                            <polyline points="17 6 23 6 23 12"></polyline>
                                        </svg>
                                    </span>
                                    + 13%
                                </span>
                            </div>
                            <div class="d-flex align-items-center ms-2 d-xxl-none">
                                <div class="d-flex align-items-center">
                                    <span class="f-w-2 f-h-2 bg-primary d-block rounded-circle me-2"></span>
                                    <span class="small text-muted">2021</span>
                                </div>
                                <div class="d-flex align-items-center ms-4">
                                    <span class="f-w-2 f-h-2 bg-secondary-faded d-block rounded-circle me-2"></span>
                                    <span class="small text-muted">2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart chart-md pt-2">
                            <canvas id="chartBar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Current Sales-->

            <!-- Footer -->
            @include('admin.component.footer')
            <!-- / Footer-->

    </section>
@endsection
