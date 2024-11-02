@include('components.toast')

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Sign In | ZoneShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('public/BackEnd/images/favicon.ico') }}">
    <link href="{{ asset('public/BackEnd/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/BackEnd/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/BackEnd/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('public/BackEnd/js/config.js') }}"></script>
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
                                    <a href="{{ URL::to('/trang-chu') }}" class="logo-dark">
                                        <img src="{{ asset('public/BackEnd/images/logo-dark.png') }}" height="24"
                                            alt="logo dark">
                                    </a>
                                    <a href="{{ URL::to('/trang-chu') }}" class="logo-light">
                                        <img src="{{ asset('public/BackEnd/images/logo-light.png') }}" height="24"
                                            alt="logo light">
                                    </a>
                                </div>
                                <h2 class="fw-bold fs-24 text-center">Administrator</h2>
                                <div class="mb-5">
                                    <form action="{{ route('login') }}" method="POST" class="authentication-form">
                                        @csrf
                                        <div class="mb-3">
                                            <x-input-label for="email" :value="__('Email')"
                                                style="margin-left: 15px; font-size: 16px;" />
                                            <x-text-input id="email" name="email" type="email"
                                                class="form-control custom-input" placeholder="Enter your email"
                                                style="padding: 15px; font-size: 16px; height: 60px;" required
                                                autofocus />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="password" :value="__('Password')"
                                                style=" margin-left: 15px; font-size: 16px;" />
                                            <x-text-input id="password" name="password" type="password"
                                                class="form-control custom-input" placeholder="Enter your password"
                                                style="padding: 15px; font-size: 16px; height: 60px;" required />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="mb-1 text-center d-grid">
                                            <x-primary-button class="btn btn-primary"
                                                style="padding: 15px; font-size: 16px; height: 60px;">
                                                {{ __('Sign In') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
