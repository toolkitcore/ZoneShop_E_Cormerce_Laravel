@extends('layout')
@section('content')
    @include('components.toast')
    <?php
    $user = Auth::user();
    $name_account = Auth::check() ? Auth::user()->name : 'Name';
    $email_account = Auth::check() ? Auth::user()->email : 'Email';
    $created_at = Auth::check() ? Auth::user()->created_at : 'Not date';
    ?>

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="{{ URL::to('trang-chu') }}">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('public/uploads/User/user-2.png') }}" alt="pic" width="80px">
                            </div>
                            <div class="media-body">
                                <h5 class="title mb-0">Hello {{ $name_account }}</h5>
                                <span class="joining-date">Zoneshop Member Since
                                    {{ date('Y-m-d', strtotime($created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard"
                                            role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab"
                                            aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                                            aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                        <a href="{{ route('logout') }}" class="nav-item nav-link"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>
                                            {{ __('Log Out') }}
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}" style="display: none;"
                                            id="logout-form">
                                            @csrf
                                        </form>

                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">Hello{{ $name_account }} (
                                            <span>{{ $name_account }}?</span> <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Log Out') }}
                                            </a>)
                                        </div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping
                                            and billing addresses, and edit your password and account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaction_list as $item)
                                                        <tr>
                                                            <th scope="row">#{{ $item->transaction_id }}</th>
                                                            <td>{{ $item->created_at }}</th>
                                                            <td>
                                                                @if ($item->transaction_status == 0 && $item->transaction_payment == 'pay_offline')
                                                                    Wait Confirm
                                                                @elseif ($item->transaction_status == 0 && $item->transaction_payment == 'pay_online')
                                                                    Not Pay
                                                                @elseif($item->transaction_status == 1)
                                                                    Wait Confirm
                                                                @elseif($item->transaction_status == 2)
                                                                    Confirmed
                                                                @elseif($item->transaction_status == 3)
                                                                    Pakaging
                                                                @elseif($item->transaction_status == 4)
                                                                    Shipping
                                                                @elseif($item->transaction_status == 5)
                                                                    Completed
                                                                @elseif($item->transaction_status == 6)
                                                                    Canceled
                                                                @endif
                                                                </th>
                                                            <td>{{ number_format($item->transaction_amount) . ' VND' }}
                                                                </th>
                                                            <td><a href="{{ URL::to('view-order-detail/' . $item->transaction_id) }}"
                                                                    class="axil-btn view-btn">View</a></th>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form">
                                                <div class="row">
                                                    <div class="col-12 row">
                                                        @include('pages.account.partials.update-profile-information-form')
                                                    </div>

                                                    <div class="col-12">
                                                        @include('pages.account.partials.update-password-form')
                                                    </div>
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
        </div>
        <!-- End My Account Area  -->

        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>
@endsection
