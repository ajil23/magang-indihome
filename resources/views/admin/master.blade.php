<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logo-telkom.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo-telkom.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo-telkom.png') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/logo-telkom.png') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
          /**
          * Reinstate scrolling for non-JS clients
          */
          .simplebar-content-wrapper {
            overflow: auto;
          }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>Admin Dashboard</title>
    
</head>
<body class="">

    <!-- Navbar-->
    @include('admin.component.header')
    <!-- / Navbar-->

    <!-- Page Aside-->
    @include('admin.component.sidebar')
    <!-- / Page Aside-->

    <!-- Page Content -->
    <main id="main">
        <!-- Content-->
        @yield('admin')
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

    {{-- Additional js--}}
    @yield('script')
</body>

</html>
