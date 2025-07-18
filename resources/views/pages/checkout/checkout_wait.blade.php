@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <section class="error-page onepage-screen-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                            <span class="title-highlighter highlighter-secondary"> <i class="fal fa-exclamation-circle"></i>
                                Wait !!!</span>
                            <h1 class="title"> Wait ZoneShop Confirm... !</h1>
                            <p>The order has been placed, please wait for the store to confirm the order. You will receive a
                                notification as soon as possible. Thank you for your purchase.</p>
                            <a href="{{ URL::to('trang-chu') }}" class="axil-btn btn-bg-secondary right-icon">Back To Home
                                <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                            <img src="{{ asset('FrontEnd/images/others/confirm_order.gif') }}" alt="wait">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
