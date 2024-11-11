<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZoneShop || Home || Electronics</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="update-quantity-route" content="{{ route('update_quantity') }}">
    <meta name="clear-cart-route" content="{{ route('clear_cart') }}">
    <meta name="remove-cart-item-url" content="{{ url('xoa-gio-hang') }}">
    <meta name="add-cart-item-url" content="{{ url('add-cart-item') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/public/FrontEnd/images/favicon.ico') }}">

    <!-- CSS
    ============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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


<body class="sticky-header newsletter-popup-modal">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

    <header class="header axil-header header-style-1">
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        {{-- <div class="header-top-dropdown">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    English
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Viet Nam</a></li>
                                    <li><a class="dropdown-item" href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">VND</a></li>
                                    <li><a class="dropdown-item" href="#">USD</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-6">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                <li><a href="#">Help</a></li>
                                <li><a href="sign-up.html">Join Us</a></li>
                                <li>
                                    @auth
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Log out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}">Sign In</a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{ URL::to('/trang-chu') }}" class="logo logo-dark">
                            <img src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="Site Logo">
                        </a>
                        <a href="{{ URL::to('/trang-chu') }}" class="logo logo-light">
                            <img src="{{ asset('public/FrontEnd/images/logo/logo-light.png') }}" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="{{ URL::to('/trang-chu') }}" class="logo">
                                    <img src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li>
                                    <a class="{{ request()->is('trang-chu') ? 'active' : '' }}"
                                        href="{{ URL::to('/trang-chu') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"
                                        class=" {{ request()->is('danh-muc-san-pham-*') ? 'active' : '' }}">Categories</a>
                                    <ul class="axil-submenu">
                                        @foreach ($categories as $category_item)
                                            <li>
                                                <a href="{{ 'danh-muc-san-pham-' . $category_item->category_id }}"
                                                    class="{{ request()->is('danh-muc-san-pham-' . $category_item->category_id) ? 'active' : '' }}">{{ $category_item->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"
                                        class=" {{ request()->is('danh-sach-san-pham') ? 'active' : '' }}">Pages</a>
                                    <ul class="axil-submenu">
                                        <li><a href="{{ URL::to('danh-sach-san-pham') }}">All Product</a></li>
                                        <li><a href="{{ URL::to('gio-hang') }}">Cart</a></li>
                                        <li><a href="{{ URL::to('show-wishlist') }}">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/thong-tin') }}"
                                        class="{{ request()->is('thong-tin') ? 'active' : '' }}">About</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#" class=" {{ request()->is('blog*') ? 'active' : '' }}">Blog</a>
                                    <ul class="axil-submenu">
                                        <li><a href="blog.html">Blog List</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ URL::to('lien-he') }}"
                                        class="{{ request()->is('lien-he') ? 'active' : '' }}">Contact</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- End Mainmanu Nav -->

                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="{{ URL::to('show-wishlist') }}">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    @php
                                        $count = Cart::content()->unique('id')->count();
                                    @endphp

                                    @if ($count != 0)
                                        <span class="cart-count">
                                            {{ $count }}
                                        </span>
                                    @endif
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">QUICKLINKS</span>
                                    <ul>
                                        <li>
                                            <a href="{{ URL::to('account') }}">My Account</a>
                                        </li>
                                        <li>
                                            <a href="#">Initiate return</a>
                                        </li>
                                        <li>
                                            <a href="#">Support</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/admin') }}">Adminstrator</a>
                                        </li>
                                    </ul>
                                    @auth
                                        <div class="login-btn">
                                            <a href="{{ route('logout') }}" class="axil-btn btn-bg-primary"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <div class="login-btn">
                                            <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Sign In</a>
                                        </div>
                                        <div class="reg-footer text-center">No account yet? <a
                                                href="{{ route('register') }}" class="btn-link">REGISTER HERE.</a></div>
                                    @endauth
                                    {{-- <div class="reg-footer text-center">No account yet? <a href="sign-up.html"
                                            class="btn-link">REGISTER HERE.</a></div> --}}
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>


    <!-- CONTENT MAIN  -->
    @yield('content')



    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('public/FrontEnd/images/icons/service1.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('public/FrontEnd/images/icons/service2.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('public/FrontEnd/images/icons/service3.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('public/FrontEnd/images/icons/service4.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>
                            <!-- <div class="logo mb--30">
                            <a href="{{ URL::to('/trang-chu') }}">
                                <img class="light-logo" src="{{ asset('public/FrontEnd/images/logo/logo.png') }}" alt="Logo Images">
                            </a>
                        </div> -->
                            <div class="inner">
                                <p>685 Market Street, <br>
                                    Las Vegas, LA 95820, <br>
                                    United States.
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i>
                                            example@domain.com</a></li>
                                    <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> (+01)
                                            850-315-5862</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Account</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="{{ URL::to('account') }}">My Account</a></li>
                                    <li><a href="sign-up.html">Login / Register</a></li>
                                    <li><a href="{{ URL::to('gio-hang') }}">Cart</a></li>
                                    <li><a href="{{ URL::to('show-wishlist') }}">Wishlist</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Link</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="terms-of-service.html">Terms Of Use</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="{{ URL::to('lien-he') }}">Contact</a></li>
                                    <li><a href="{{ URL::to('lien-he') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Download App</h5>
                            <div class="inner">
                                <span>Save $3 With App & New User only</span>
                                <div class="download-btn-group">
                                    <div class="qr-code">
                                        <img src="{{ asset('public/FrontEnd/images/others/qr.png') }}"
                                            alt="Axilthemes">
                                    </div>
                                    <div class="app-link">
                                        <a href="#">
                                            <img src="{{ asset('public/FrontEnd/images/others/app-store.png') }}"
                                                alt="App Store">
                                        </a>
                                        <a href="#">
                                            <img src="{{ asset('public/FrontEnd/images/others/play-store.png') }}"
                                                alt="Play Store">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2023. All rights reserved by <a target="_blank"
                                        href="https://axilthemes.com/">Axilthemes</a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div
                            class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{ asset('public/FrontEnd/images/icons/cart/cart-1.png') }}"
                                        alt="paypal cart"></li>
                                <li><img src="{{ asset('public/FrontEnd/images/icons/cart/cart-2.png') }}"
                                        alt="paypal cart"></li>
                                <li><img src="{{ asset('public/FrontEnd/images/icons/cart/cart-5.png') }}"
                                        alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div
                                            class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail" id="large-image-container">
                                                <img class="view-picture"
                                                    src="{{ asset('public/FrontEnd/images/product/product-big-01.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget view-discount">20% OFF</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{ asset('public/FrontEnd/images/icons/rate.png') }}"
                                                    alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="view-product-title">Serif Coffee Table</h3>
                                        <h4 class="view-price-amount">10000 VND</h4>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="view-description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                            pretium. Integer ante est, elementum eget magna. Pellentesque sagittis
                                            dictum libero, eu dignissim tellus.</p>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty">
                                                <input type="text" class="quantity-product" value="1">
                                            </div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart">
                                                    <a href="{{ URL::to('gio-hang') }}"
                                                        class="axil-btn btn-bg-primary add-to-cart-quickview">Add to
                                                        Cart
                                                    </a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" id="search-navbar" class="form-control" name="prod-search"
                            id="prod-search" placeholder="Search Prouct ....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title"><span id="product_count">0</span> Result Found</h6>
                    <a href="{{ URL::to('danh-sach-san-pham') }}" class="view-all">View All</a>
                </div>
                <div class="psearch-results" id="content">

                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->
    <?php
    
    use Gloudemans\Shoppingcart\Facades\Cart;
    
    $content = Cart::content();
    ?>

    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    @foreach ($content as $key => $v_content)
                        <li class="cart-items cart-item cart-item-remove-{{ $v_content->rowId }}">
                            <div class="item-img">
                                <a href="{{ 'san-pham-' . $v_content->id }}"><img
                                        src="{{ asset($v_content->options->image) }}" alt="Commodo Blown Lamp"></a>
                                <button class="close-btn remove-cart-product" data-rowid="{{ $v_content->rowId }}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a
                                        href="{{ 'san-pham-' . $v_content->id }}">{{ $v_content->name }}</a>
                                </h3>
                                <div class="item-price"><span
                                        class="currency-symbol"></span>{{ number_format($v_content->price) }}
                                    VND</div>
                                <div class="pro-qty item-quantity">
                                    <input type="number" class="quantity-input cart-quantity"
                                        value="{{ $v_content->qty }}" data-rowId="{{ $v_content->rowId }}" readonly>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount total-all">
                        {{ Cart::subtotal(0) . ' VND' }}</span>
                </h3>
                <div class="group-btn">
                    <a href="{{ URL::to('gio-hang') }}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Offer Modal Start -->
    <div class="offer-popup-modal" id="offer-popup-modal">
        <div class="offer-popup-wrap">
            <div class="card-body">
                <button class="popup-close"><i class="fas fa-times"></i></button>
                <div class="content">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                            Don’t Miss!!</span>
                        <h3 class="title">Best Sales Offer<br> Grab Yours</h3>
                    </div>
                    <div class="poster-countdown countdown"></div>
                    <a href="shop.html" class="axil-btn btn-bg-primary">Shop Now <i
                            class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{ asset('public/FrontEnd/js/ajax/cart.js') }}"></script>
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
<script type="text/javascript">
    $(document).on('click', '.quick-view-button', function(e) {
        e.preventDefault();
        var product_id = $(this).data('id');
        // alert(product_id);

        $.ajax({
            url: 'product-detail/' + product_id,
            method: 'GET',
            success: function(data) {
                // alert(data.product_name);
                $('#quick-view-modal .view-product-title').text(data.product.product_name);
                $('#quick-view-modal .view-price-amount')
                    .text(number_format(data.product.product_price_selling) + ' VND');

                $('#quick-view-modal .view-description').text(data.product.product_description);
                $('#quick-view-modal .view-picture').attr('src', data.product.product_image);
                var originalPrice = data.product.product_price_original;
                var sellingPrice = data.product.product_price_selling;
                var discountPercentage = Math.round(((originalPrice - sellingPrice) /
                    originalPrice) * 100);
                if (originalPrice > 0) {
                    $('#quick-view-modal .view-discount').text(discountPercentage + '% Off');
                } else {
                    $('#quick-view-modal .view-discount').text('No Discount Available');
                }
                $('#quick-view-modal .add-to-cart-quickview').data('id', product_id);


            },
            error: function() {
                alert('Lỗi rồi nha cu');
            }
        });

        $(document).off('click', '.add-to-cart-quickview').on('click', '.add-to-cart-quickview', function(e) {
            e.preventDefault();
            var product_id = $(this).data('id'); // Retrieve product ID directly from button data
            var quantity = $('#quick-view-modal .quantity-product').val();

            $.ajax({
                url: '{{ route('add_cart_item') }}',
                method: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}' // Thêm CSRF token vào dữ liệu gửi đi
                },
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    alert("Có lỗi rồi check lại đi .");
                }
            })
        });
        // product_id = null;
    });
    $(document).on('keyup', '#search-navbar', function() {
        $value = $(this).val();
        if ($value) {
            $('.psearch-results').show();
        }

        $.ajax({
            type: 'get',
            url: "{{ URL::to('search-navbar') }}",
            data: {
                'search': $value,
            },
            success: function(data) {
                $('#content').html(data.output);
                $('#product_count').text(data.products_count);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText); // In lỗi nếu có
            }
        });
    });
</script>
