<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Forgot Password</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('FrontEnd/images/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/style.css') }}">
</head>

<body>
    <div class="axil-signin-area">
        <!-- Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="index.html" class="site-logo"><img
                            src="{{ asset('FrontEnd/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Remembered your password?</p>
                        <a href="{{ route('login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Log in</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 offset-xl-3">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Forgot Your Password?</h3>
                        <p class="b2 mb--55">Enter your email address to reset your password</p>
                        <form method="POST" action="{{ route('password.email') }}" class="singin-form">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Send Password Reset
                                    Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('FrontEnd/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/js/main.js') }}"></script>
</body>

</html>
