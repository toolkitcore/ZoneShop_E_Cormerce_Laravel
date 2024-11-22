<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <title>Sign In | ZoneShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/BackEnd/images/favicon.ico') }}">

    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="h-100">
    <div class="d-flex flex-column h-100 p-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="row h-100">
                <div class="col-xxl-12">
                    <div class="row justify-content-center h-100">
                        <div class="col-lg-6 py-lg-5">
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div class="auth-logo mb-4">
                                    <a href="{{ route('home') }}" class="logo-dark">
                                        <img src="{{ asset('public/BackEnd/images/logo-dark.png') }}" height="24"
                                            alt="logo dark">
                                    </a>
                                    <a href="{{ route('home') }}" class="logo-light">
                                        <img src="{{ asset('public/BackEnd/images/logo-light.png') }}" height="24"
                                            alt="logo light">
                                    </a>
                                </div>
                                <h2 class="fw-bold fs-24 text-center">Administrator</h2>
                                <div class="mb-5">
                                    <!-- Form -->
                                    <form action="{{ route('admin.login') }}" method="POST">
                                        @csrf
                                        <!-- Session Status -->
                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label"
                                                style="margin-left: 15px; font-size: 16px;">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control custom-input" placeholder="Enter your email"
                                                value="{{ old('email') }}" required autofocus
                                                style="padding: 15px; font-size: 16px; height: 60px;">
                                            @error('email')
                                                <span class="text-danger mt-2 d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label"
                                                style="margin-left: 15px; font-size: 16px;">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control custom-input" placeholder="Enter your password"
                                                required style="padding: 15px; font-size: 16px; height: 60px;">
                                            @error('password')
                                                <span class="text-danger mt-2 d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" id="remember"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-1 text-center d-grid">
                                            <button class="btn btn-soft-primary" name="login" type="submit"
                                                style="padding: 15px; font-size: 16px; height: 60px;">Sign In</button>
                                        </div>

                                        <!-- Forgot Password -->
                                        <div class="mt-3 text-center">
                                            @if (Route::has('admin.password.request'))
                                                <a href="{{ route('admin.password.request') }}"
                                                    class="text-muted">Forgot your password?</a>
                                            @endif
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
