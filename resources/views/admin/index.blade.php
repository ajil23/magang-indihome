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
        <p class="text-muted mb-5">Get a quick overview of your company's current status below.</p>
        <!-- / Page Title-->

        <!-- Top Row Widgets-->
        <div class="row g-4">

            <!-- Number Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Total Sector
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1"></span>
                                    {{ $sector }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Orders Widget-->

            <!-- Average Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Data Sales
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1"></span>
                                    {{ $dataSales }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Average Orders Widget-->

            <!-- Pageviews Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Transaction Type
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold">{{ $transaction }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Pageviews Widget-->

            <!-- Number Refunds Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Sales
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1"></span>
                                    {{ $sales }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Refunds Widget-->
            <!-- Footer -->
            @include('admin.component.footer')
            <!-- / Footer-->

    </section>
@endsection
