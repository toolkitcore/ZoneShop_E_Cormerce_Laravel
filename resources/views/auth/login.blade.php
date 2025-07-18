<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('FrontEnd/images/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/style.css') }}">

</head>

<body>
    <div class="axil-signin-area">

        <!-- Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="{{ URL::to('trang-chu') }}" class="site-logo"><img
                            src="{{ asset('FrontEnd/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Not a member?</p>
                        <a href="{{ route('register') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sign-In Form -->
        <div class="row">
            <div class="col-lg-12 offset-xl-3">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign in to ZoneShop.</h3>
                        <p class="b2 mb--55">Enter your details below</p>

                        <!-- Laravel Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group d-flex mt-4">
                                <input id="remember_me" type="checkbox" name="remember" class="mr-2">
                                <label for="remember_me" class="text-gray-600">Remember me</label>
                            </div>

                            <!-- Submit and Forgot Password -->
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary" style="width: 200px">Sign
                                    In</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-btn">Forgot your
                                        password?</a>
                                @endif
                            </div>
                            <a href="{{ route('login-google') }}" class="mt-2 axil-btn btn-bg-secondary"
                                name="login_google" style="padding: 15px; font-size: 16px; height: 58px;"> Log in with
                                Google
                                <img src="https://techdocs.akamai.com/identity-cloud/img/social-login/identity-providers/iconfinder-new-google-favicon-682665.png"
                                    width="20px" height="15px" alt=""></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('FrontEnd/js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/main.js') }}"></script>

</body>

</html>
