@extends('layout')
@section('content')
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
                                <li class="axil-breadcrumb-item active" aria-current="page">All Products</li>
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="axil-shop-sidebar">
                            <div class="d-lg-none">
                                <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title">CATEGORIES</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="current-cat">
                                            <input type="checkbox" class="form-check-input" id="all-categories" checked>
                                            <label class="form-check-label" for="all-categories">All Category</label>
                                        </li>
                                        @foreach ($categories as $category)
                                            <li>
                                                <input type="checkbox" class="form-check-input common_selector category"
                                                    id="category-{{ $category->category_id }}"
                                                    value="{{ $category->category_id }}">
                                                <label class="form-check-label"
                                                    for="category-{{ $category->category_id }}">{{ $category->category_name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="toggle-list product-categories product-gender active">
                                <h6 class="title">BRANDS</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="chosen">
                                            <input type="checkbox" class="form-check-input" id="all-brands" checked>
                                            <label class="form-check-label" for="all-brands">All Brand</label>
                                        </li>
                                        @foreach ($brands as $brand)
                                            <li>
                                                <input type="checkbox" class="form-check-input common_selector brand"
                                                    id="brand-{{ $brand->brand_id }}" value="{{ $brand->brand_id }}">
                                                <label class="form-check-label"
                                                    for="brand-{{ $brand->brand_id }}">{{ $brand->brand_name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="toggle-list product-price-range active">
                                <h6 class="title">PRICE</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="chosen"><a href="#">30</a></li>
                                        <li><a href="#">5000</a></li>
                                    </ul>
                                    <form action="#" class="mt--25">
                                        <div id="slider-range"></div>
                                        <div class="flex-center mt--20">
                                            <span class="input-range">Price: </span>
                                            <input type="text" id="amount" class="amount-range" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <button class="axil-btn btn-bg-primary">All Reset</button>
                        </div>
                        <!-- End .axil-shop-sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="axil-shop-top mb--40">
                                    <div
                                        class="category-select align-items-center justify-content-lg-end justify-content-between">
                                        <!-- Start Single Select  -->
                                        <span class="filter-results">Showing 1-12 of 84 results</span>
                                        <select class="single-select">
                                            <option>Short by Latest</option>
                                            <option>Short by Oldest</option>
                                            <option>Short by Name</option>
                                            <option>Short by Price</option>
                                        </select>
                                        <!-- End Single Select  -->
                                    </div>
                                    <div class="d-lg-none">
                                        <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i>
                                            FILTER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .row -->
                        <div class="row row--15 filter_data">
                            {{-- @foreach ($products as $product)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="axil-product product-style-one mb--30">
                                        <div class="thumbnail">
                                            <a href="{{ URL::to('san-pham-' . $product->product_id) }}">
                                                <img src="{{ asset($product->product_image) }}" alt="Product Images">
                                            </a>
                                            <div class="label-block label-right">
                                                <div class="product-badget">
                                                    {{ round((($product->product_price_original - $product->product_price_selling) / $product->product_price_original) * 100) }}%
                                                    OFF</div>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="far fa-heart"></i></a></li>
                                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view-modal"><i
                                                                class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a
                                                        href="{{ URL::to('san-pham-' . $product->product_id) }}">{{ $product->product_name }}</a>
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
                            @endforeach --}}
                        </div>
                        <div class="text-center pt--20">
                            <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->

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
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Lấy token từ meta tag
                }
            });
            filter_data();

            function filter_data() {
                var action = 'get_data';
                var priceSlider = $('#slider-range');

                var minCost = priceSlider.slider("values", 0);
                var maxCost = priceSlider.slider("values", 1);

                var category = get_filter('category');
                var brand = get_filter('brand');

                $.ajax({
                    url: "{{ route('get_list_product') }}",
                    method: 'POST',
                    data: {
                        action: action,
                        minCost: minCost,
                        maxCost: maxCost,
                        category: category,
                        brand: brand,
                    },
                    success: function(data) {
                        $('.filter_data').html(data.output); // Cập nhật HTML từ dữ liệu JSON
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown); // Xử lý lỗi nếu cần
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#slider-range').on('slidechange', function(event, ui) {
                filter_data();
            });
        })
    </script>
@endsection
