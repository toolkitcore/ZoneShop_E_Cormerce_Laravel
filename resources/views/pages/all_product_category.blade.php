@extends('layout')
@section('content')
    @include('components.toast')
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
                                <li class="axil-breadcrumb-item active" aria-current="page">
                                    Categories
                                </li>
                            </ul>
                            <h1 class="title">All Products Of
                                <span class="text-primary">{{ $category->category_name }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row row--15">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="axil-product product-style-one has-color-pick mt--40">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset($product->product_image) }}" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">
                                            {{ round((($product->product_price_original - $product->product_price_selling) / $product->product_price_original) * 100) }}%
                                            Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="{{ URL::to('show-wishlist') }}"><i
                                                        class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html" class="add-cart-item"
                                                    data-product-id="{{ $product->product_id }}">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">3{{ $product->product_name }}</a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <span
                                                class="price current-price">{{ number_format($product->product_price_selling) . ' VND' }}</span>
                                            <span
                                                class="price old-price">{{ number_format($product->product_price_original) . ' VND' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
