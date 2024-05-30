{{-- @php
    $favicon = App\Models\BackendModels\Logo::where('type', 'Favicon')->first();
@endphp --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description"
        content="Fs Design Center">
    <meta name="keywords"
        content="Fs Design Center">
    <meta name="author" content="pixelstrap">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.3.1109/styles/kendo.default-v2.min.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.3.1109/js/kendo.all.min.js"></script>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/styles/bootstrap_admin_login.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/vendors/styles/style_admin_login.css') }}">


    @yield('style')
</head>

<body>

    <style>
        .login-card {
            background-repeat: no-repeat !important;
            background-size: cover !important;

        }

        .login-card {
            width: 100% !important;
            height: 100% !important;
            background-size: cover !important;
            background-position: center !important;
        }

        .btn-primary {
            background-color: #e52727 !important;
            border-color: #fff !important;
            color: #fff !important;
            margin-top: 12px;
        }

        .login-card .login-main {
            background-color: #e52727 !important;

        }

        .login-card .login-main .theme-form h4 {
            color: white !important;
        }

        .login-card .login-main .theme-form p {
            color: #ffffff !important;
            margin-bottom: 20px !important;
        }

        .login-card .login-main .theme-form label {
            color: white !important;
        }
    </style>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('admin.auth') }}">
                                @csrf
                                <h4 class="align-center">Admin Login Dashboard</h4>
                                <p>Enter your email & password to login</p>
                                <!-- Email Address -->
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Enter Email Address">
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Enter Password">
                                </div>
                                <!-- Remember Me -->
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Log in</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

