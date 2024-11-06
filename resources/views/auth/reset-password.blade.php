<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Reset Password</title>
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
                <div class="col-xl-4 col-sm-6">
                    <a href="{{ route('home') }}" class="site-logo"><img
                            src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                {{-- <div class="col-md-2 d-lg-block d-none">
                    <a href="{{ route('forget') }}" class="back-btn"><i class="far fa-angle-left"></i></a>
                </div> --}}
                <div class="col-xl-6 col-lg-4 col-sm-6">
                    <div class="singin-header-btn">
                        <p>Already a member? <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 offset-xl-3">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Reset Password</h3>
                        <form method="POST" action="{{ route('password.update') }}" class="signin-form">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"> <!-- Giả lập PUT -->

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email', $request->email) }}" required autofocus
                                    autocomplete="username">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="form-group mt-4">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mt-4">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">
                                    Reset
                                    Password</button>
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
