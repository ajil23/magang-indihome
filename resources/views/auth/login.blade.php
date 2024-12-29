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
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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
    <title>Telkom Indonesia</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

        <!-- Login Form-->
        <div class="d-flex flex-column w-100 align-items-center">

            <!-- Logo-->
            <a href="#" class="d-table mt-5 mb-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img src="{{asset('assets/images/logo_telkom_indonesia.png')}}" style="height: 80px; width:100px;" alt="">
                </div>
            </a>
            <!-- Logo-->

            <div class="shadow-lg rounded p-4 p-sm-5 bg-white form">
                <h3 class="fw-bold">Login</h3>
                <p class="text-muted">Welcome back!</p>

                <!-- Login Form-->
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="login-email">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocusplaceholder="name@email.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="login-password"
                            class="form-label d-flex justify-content-between align-items-center">
                            {{ __('Password') }}
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required
                            autocomplete="current-password"placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary d-block w-100 my-4">{{ __('Login') }}</button>
                </form>
                <!-- / Login Form -->
            </div>
        </div>
        <!-- / Login Form-->

    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>
