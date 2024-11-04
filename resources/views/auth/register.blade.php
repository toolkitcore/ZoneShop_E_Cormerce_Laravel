<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Register</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/FrontEnd/images/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/FrontEnd/css/style.css') }}">
</head>

<body>
    <div class="axil-signin-area">
        <!-- Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="{{ URL::to('trang-chu') }}" class="site-logo"><img
                            src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Already registered?</p>
                        <a href="{{ route('login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Log in</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 offset-xl-3">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Register at ZoneShop</h3>
                        <p class="b2 mb--55">Enter your details below</p>
                        <form method="POST" action="{{ route('register') }}" class="singin-form">
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <!-- Email Address -->
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <!-- Password -->
                                <div class="form-group col-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-3 col-12">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('public/FrontEnd/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/FrontEnd/js/main.js') }}"></script>
</body>

</html>
