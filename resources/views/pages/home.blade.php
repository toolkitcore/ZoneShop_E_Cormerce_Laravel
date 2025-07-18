<!-- PAGE HOME -->
@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <div class="axil-main-slider-area main-slider-style-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-sm-6">
                        <div class="main-slider-content">
                            <div class="slider-content-activation-one">
                                @foreach ($slider_home as $item)
                                    <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="400"
                                        data-sal-duration="800">
                                        <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                        <h1 class="title">{{ $item->product->product_name }}</h1>
                                        <div class="slide-action">
                                            <div class="shop-btn">
                                                <a href="{{ URL::to('san-pham-' . $item->product_id) }}"
                                                    class="axil-btn btn-bg-white"><i class="fal fa-shopping-cart"></i>Shop
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="single-slide slick-slide">
                                    <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                    <h1 class="title">Smart Digital Watch</h1>
                                    <div class="slide-action">
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn btn-bg-white"><i
                                                    class="fal fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                        <div class="item-rating">
                                            <div class="thumb">
                                                <ul>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author1.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author2.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author3.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author4.png') }}"
                                                            alt="Author"></li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <span class="rating-icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </span>
                                                <span class="review-text">
                                                    <span>100+</span> Reviews
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                    <h1 class="title">Roco Wireless Headphone</h1>
                                    <div class="slide-action">
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn btn-bg-white"><i
                                                    class="fal fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                        <div class="item-rating">
                                            <div class="thumb">
                                                <ul>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author1.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author2.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author3.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author4.png') }}"
                                                            alt="Author"></li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <span class="rating-icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </span>
                                                <span class="review-text">
                                                    <span>100+</span> Reviews
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                    <h1 class="title">Smart Digital Watch</h1>
                                    <div class="slide-action">
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn btn-bg-white"><i
                                                    class="fal fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                        <div class="item-rating">
                                            <div class="thumb">
                                                <ul>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author1.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author2.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author3.png') }}"
                                                            alt="Author"></li>
                                                    <li><img src="{{ asset('public/FrontEnd/images/others/author4.png') }}"
                                                            alt="Author"></li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <span class="rating-icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </span>
                                                <span class="review-text">
                                                    <span>100+</span> Reviews
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-6">
                        <div class="main-slider-large-thumb">
                            <div class="slider-thumb-activation-one axil-slick-dots">
                                @foreach ($slider_home as $item)
                                    <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600"
                                        data-sal-duration="1500">
                                        <img src="{{ asset($item->slider_image) }}" alt="Product">
                                        <div class="product-price">
                                            <span class="text">From</span>
                                            <span
                                                class="price-amount">{{ number_format($item->product->product_price_selling) . ' VND' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600"
                                    data-sal-duration="1500">
                                    <img src="{{ asset('public/FrontEnd/images/product/product-39.png') }}" alt="Product">
                                    <div class="product-price">
                                        <span class="text">From</span>
                                        <span class="price-amount">$49.00</span>
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <img src="{{ asset('public/FrontEnd/images/product/product-38.png') }}" alt="Product">
                                    <div class="product-price">
                                        <span class="text">From</span>
                                        <span class="price-amount">$49.00</span>
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <img src="{{ asset('public/FrontEnd/images/product/product-39.png') }}" alt="Product">
                                    <div class="product-price">
                                        <span class="text">From</span>
                                        <span class="price-amount">$49.00</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1"><img src="{{ asset('FrontEnd/images/others/shape-1.png') }}" alt="Shape">
                </li>
                <li class="shape-2"><img src="{{ asset('FrontEnd/images/others/shape-2.png') }}" alt="Shape">
                </li>
            </ul>
        </div>

        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
                    <h2 class="title">Browse by Category</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    @foreach ($categories as $item)
                        <div class="slick-single-layout">
                            <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                                <a href="{{ URL::to('danh-muc-san-pham-' . $item->category_id) }}">
                                    <img class="img-fluid" src="{{ 'uploads/category/' . $item->category_image }}"
                                        alt="product categorie">
                                    <h6 class="cat-title">{{ $item->category_name }}</h6>
                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Categorie Area  -->


        <div class="axil-single-post post-formate post-gallery">
            <div class="container">
                <div class="content-block">
                    <div class="inner">
                        <div class="blog-gallery-activation axil-slick-arrow arrow-between-side">
                            @foreach ($poster_home as $item)
                                <div class="post-thumbnail">
                                    <img src="{{ asset($item->poster_image) }}" alt="blog Images">
                                </div>
                            @endforeach
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                </div>
                <!-- End .content-blog -->
            </div>
        </div>
        <!-- End Poster Countdown Area  -->

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our
                        Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            @foreach ($products as $product_item)
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="{{ URL::to('san-pham-' . $product_item->product_id) }}">
                                                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                    loading="lazy" class="main-img"
                                                    src="{{ asset($product_item->product_image) }}" alt="Product Images">
                                                <img class="hover-img"
                                                    src="{{ asset($product_item->productImages->first()->image_name ?? $product_item->product_image) }}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="label-block label-right">
                                                <div class="product-badget">
                                                    {{ round((($product_item->product_price_original - $product_item->product_price_selling) / $product_item->product_price_original) * 100) }}%
                                                    Off</div>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="quickview">
                                                        <a href="#" class="quick-view-button" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view-modal"
                                                            data-id="{{ $product_item->product_id }}">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li class="select-option">
                                                        <a href="{{ URL::to('gio-hang') }}" class="add-cart-item"
                                                            data-product-id="{{ $product_item->product_id }}">
                                                            Add to Cart
                                                        </a>
                                                    </li>
                                                    <li class="wishlist">
                                                        <a href="#" class="add-to-wishlist"
                                                            data-product-id="{{ $product_item->product_id }}">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">

                                                <h5 class="title">
                                                    <a href="product-detail/">
                                                        {{ $product_item->product_name }}
                                                    </a><br>
                                                    ({{ $product_item->category->category_name }})
                                                </h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price">$
                                                        {{ number_format($product_item->product_price_selling) }}
                                                    </span>
                                                    <span class="price old-price">$
                                                        {{ number_format($product_item->product_price_original) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-01.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Yantiti Leather & Canvas
                                                    Bags</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-02.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-03.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-04.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-05.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-06.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-07.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('public/FrontEnd/images/product/electric/product-08.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->

                        </div>
                    </div>
                    <!-- End .slick-single-layout --> --}}
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="{{ URL::to('danh-sach-san-pham') }}" class="axil-btn btn-bg-lighter btn-load-more">View
                            All Products</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Expolre Product Area  -->

        <!-- Start Testimonila Area  -->
        <div class="axil-testimoial-area axil-section-gap bg-vista-white">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i
                            class="fal fa-quote-left"></i>Testimonials</span>
                    <h2 class="title">Users Feedback</h2>
                </div>
                <!-- End .section-title -->
                <div
                    class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                    @foreach ($feed_back as $item)
                        <div class="slick-single-layout testimonial-style-one">
                            <div class="review-speech">
                                <p>“ {{ $item->review }}“</p>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <span class="designation">Head Of Idea</span>
                                    <h6 class="title">{{ $item->user->name }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Testimonila Area  -->

        <!-- Start Most Sold Product Area  -->
        <div class="axil-most-sold-product axil-section-gap">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper section-title-center">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> Most Sold</span>
                        <h2 class="title">Most Sold in ZoneShop Store</h2>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 row--15">
                        @foreach ($topSellingProducts as $item)
                            <div class="col">
                                <div class="axil-product-list">
                                    <div class="thumbnail">
                                        <a href="{{ URL::to('san-pham-' . $item->product_id) }}">
                                            <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500"
                                                src="{{ asset($item->product_image) }}" alt="{{ $item->product_image }}"
                                                width="100px">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a
                                                href="{{ URL::to('san-pham-' . $item->product_id) }}">{{ $item->product_name }}</a>
                                        </h6>
                                        <div class="product-price-variant">
                                            <span
                                                class="price current-price">{{ number_format($item->product_price_selling) . ' VND' }}</span>
                                            <span
                                                class="price old-price">{{ number_format($item->product_price_original) . ' VND' }}</span>
                                        </div>
                                        <div class="product-cart">
                                            <a href="cart.html" class="cart-btn add-cart-item"
                                                data-product-id="{{ $item->product_id }}">
                                                <i class="fal fa-shopping-cart"></i>
                                            </a>
                                            <a href="#" class="cart-btn add-to-wishlist"
                                                data-product-id="{{ $item->product_id }}"><i
                                                    class="fal fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Sold Product Area  -->

        <!-- Start Why Choose Area  -->
        <div class="axil-why-choose-area pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-secondary"><i class="fal fa-thumbs-up"></i>Why Us</span>
                    <h2 class="title">Why People Choose Us</h2>
                </div>
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('FrontEnd/images/icons/service6.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('FrontEnd/images/icons/service7.png') }}" alt="Service">
                            </div>
                            <h6 class="title">100% Guarantee On Product</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('FrontEnd/images/icons/service8.png') }}" alt="Service">
                            </div>
                            <h6 class="title">24 Hour Return Policy</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('FrontEnd/images/icons/service9.png') }}" alt="Service">
                            </div>
                            <h6 class="title">24 Hour Return Policy</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('FrontEnd/images/icons/service10.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Next Level Pro Quality</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).on('click', '.header-search-icon', function(e) {
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

                },
                error: function() {
                    showToast('Error please try again !', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#dc3545'
                    });
                }
            });
        });

        function number_format(number, decimals = 2, decPoint = '.', thousandsSep = ',') {
            number = parseFloat(number).toFixed(decimals);
            const parts = number.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep);

            return parts[1] === '00' ? parts[0] : parts.join(decPoint);
        }
        $(document).on('click', '.add-to-wishlist', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

            var button = $(this);
            var productId = $(this).data('product-id');
            $.ajax({
                type: 'POST',
                url: '{{ route('addToWishlist') }}',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        showToast(response.message, {
                            gravity: 'top',
                            position: 'right',
                            duration: 3000,
                            close: false,
                            backgroundColor: '#28a745'
                        });
                    } else {
                        showToast(response.error, {
                            gravity: 'top',
                            position: 'right',
                            duration: 3000,
                            close: false,
                            backgroundColor: '#dc3545'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // showToast(error, {
                    //     gravity: 'top',
                    //     position: 'right',
                    //     duration: 3000,
                    //     close: true,
                    //     backgroundColor: '#dc3545'
                    // });
                    // alert('Error adding product to wishlist:', error);
                    // console.log(xhr.responseText); // Log the entire response for more details
                }
            });
        });

        function showToast(text, options) {
            Toastify({
                text: text,
                gravity: options.gravity,
                position: options.position,
                duration: options.duration,
                close: false,
                backgroundColor: options.backgroundColor,
            }).showToast();
        }
    </script>
@endsection
