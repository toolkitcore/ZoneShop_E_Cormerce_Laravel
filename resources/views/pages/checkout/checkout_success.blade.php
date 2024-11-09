@extends('layout')
@section('content')
    <main class="main-wrapper">
        <section class="error-page onepage-screen-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                            <span class="title-highlighter highlighter-secondary">
                                <i class="fal fa-exclamation-circle">
                                </i>
                                Successfully !!!
                            </span>
                            <h1 class="title">Sucessfully !</h1>
                            <p>The order has been confirmed. The order will be shipped to you soon. Please keep an eye on
                                your phone to receive the delivery. Thank you for your trust!</p>
                            <a href="{{ URL::to('trang-chu') }}" class="axil-btn btn-bg-secondary right-icon">Back To Home
                                <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                            <img src="{{ asset('public/FrontEnd/images/others/checkout_success.png') }}" alt="success">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
