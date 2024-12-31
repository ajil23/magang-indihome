@extends('sales.master')
@section('sales')
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

        <!-- Footer -->
        @include('sales.component.footer')
        <!-- / Footer-->

    </section>
@endsection
