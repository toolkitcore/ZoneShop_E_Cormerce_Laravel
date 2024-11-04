<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/FrontEnd/images/favicon.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/style.css') }}">

</head>

<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="{{ URL::to('trang-chu') }}" class="site-logo"><img
                            src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Not a member?</p>
                        <a href="sign-up.html" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-lg-12 offset-xl-3">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign in to ZoneShop.</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <form class="singin-form">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="annie@example.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="123456789">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                <a href="forgot-password.html" class="forgot-btn">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('public/FrontEnd/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('public/FrontEnd/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="{{ asset('public/FrontEnd/js/vendor/jquery.style.switcher.js') }}"></script> -->
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('public/FrontEnd/js/main.js') }}"></script>

</body>

</html>
