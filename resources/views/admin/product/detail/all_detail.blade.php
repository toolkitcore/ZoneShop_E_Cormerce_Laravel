@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    <div class="page-content">
        <div class="container-xxl">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="row">
                <div class="col-lg-3">
                    <div class="card bg-light-subtle">
                        <div class="card-header border-0">
                            <div class="search-bar me-3 mb-1">
                                <span><i class="bx bx-search-alt"></i></span>
                                <input type="search" name="search" class="form-control" id="search"
                                    placeholder="Search ...">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body border-light">
                            <a href="#"
                                class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0"
                                data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false"
                                aria-controls="other">Categories
                                <i class='bx bx-chevron-down ms-auto fs-20'></i>
                            </a>
                            <div id="categories" class="collapse show">
                                <div class="categories-list d-flex flex-column gap-2 mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="all-categories" checked>
                                        <label class="form-check-label" for="all-categories">All Categories</label>
                                    </div>
                                    @foreach ($categories as $category_item)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input common_selector category"
                                                id="fashion-categories" value="{{ $category_item->category_id }}">
                                            <label class="form-check-label" for="fashion-categories">
                                                {{ $category_item->category_name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="#"
                                    class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0"
                                    data-bs-toggle="collapse" data-bs-target="#brand" aria-expanded="false"
                                    aria-controls="other">Brands
                                    <i class='bx bx-chevron-down ms-auto fs-20'></i>
                                </a>
                                <div id="brand" class="collapse show">
                                    <div class="categories-list d-flex flex-column gap-2 mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="all-brand" checked>
                                            <label class="form-check-label" for="all-price">All Brand</label>
                                        </div>
                                        @foreach ($brands as $brand_item)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input common_selector brand"
                                                    id="price-1" value="{{ $brand_item->brand_id }}">
                                                <label class="form-check-label"
                                                    for="price-1">{{ $brand_item->brand_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#"
                                    class="btn-link d-flex align-items-center text-dark bg-light p-2 rounded fw-medium fs-16 mb-0"
                                    data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false"
                                    aria-controls="other">Product Price
                                    <i class='bx bx-chevron-down ms-auto fs-20'></i>
                                </a>
                                <div id="price" class="collapse show">
                                    <div class="categories-list d-flex flex-column gap-2 mt-2">
                                        <h5 class="text-dark fw-medium mt-3">Custom Price Range :</h5>
                                        <div id="product-price-range" [data-slider-size="md" ] class="">

                                        </div>
                                        <div class="formCost d-flex gap-2 align-items-center mt-2">
                                            <input class="form-control form-control-sm text-center" type="text"
                                                id="minCost" value="0">
                                            <span class="fw-semibold text-muted">to</span>
                                            <input class="form-control form-control-sm text-center" type="text"
                                                id="maxCost" value="1000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card bg-light-subtle">
                        <div class="card-header border-0">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-6">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item fw-medium"><a href="javascript: void(0);"
                                                class="text-dark">Categories</a></li>
                                        <li class="breadcrumb-item active">All Product</li>
                                    </ol>
                                    <p class="mb-0 text-muted">Showing all <span
                                            class="text-dark fw-semibold">{{ $product_count }}</span> items results</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-md-end mt-3 mt-md-0">
                                        @can('add product')
                                            <a href="{{ 'add-product' }}" class="btn btn-success me-1"><i
                                                    class="bx bx-plus"></i> New Product</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row filter_data">
                        {{-- @foreach ($products as $product_item)
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <img src="{{ $product_item->product_image }}" alt="" class="img-fluid ">
                                    <div class="card-body bg-light-subtle rounded-bottom">
                                        <a href="product-details.html" class="text-dark fw-medium fs-16">
                                            {{ $product_item->product_name }}</a>
                                        <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2">
                                            <span class="text-muted text-decoration-line-through">
                                                {{ '$' . number_format($product_item->product_price_original, 0) }}

                                            </span>
                                            {{ '$' . number_format($product_item->product_price_selling, 0) }}
                                            <small class="text-muted">
                                                ({{ number_format((($product_item->product_price_original - $product_item->product_price_selling) / $product_item->product_price_original) * 100, 0) }}
                                                % Off)
                                            </small>
                                        </h4>
                                        <div class="mt-3">
                                            <div class="d-flex gap-2">
                                                <div class="dropdown">
                                                    <a href="#"
                                                        class="btn btn-soft-primary border border-primary-subtle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class='bx bx-dots-horizontal-rounded'></i></a>
                                                    <div class="dropdown-menu">
                                                        <!-- item-->
                                                        <a href="#!" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="#!" class="dropdown-item">Overview</a>
                                                        <!-- item-->
                                                        <a href="#!" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                                <a href=""
                                                    class="btn btn-outline-dark border border-secondary-subtle d-flex align-items-center justify-content-center gap-1 w-100">
                                                    Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="position-absolute top-0 end-0 p-3">
                                        <button type="button"
                                            class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle"><iconify-icon
                                                icon="solar:heart-broken"></iconify-icon></button>
                                    </span>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                    <div class="row search_data" id="Content">
                    </div>




                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if ($value) {
                $('.filter_data').hide();
                $('.search_data').show();
            } else {
                $('.filter_data').show();
                $('.search_data').hide();
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('admin/search') }}",
                data: {
                    'search': $value,
                },
                success: function(data) {
                    console.log("AJAX Success:", data); // In dữ liệu trả về
                    $('#Content').html(data);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText); // In lỗi nếu có
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Lấy token từ meta tag
                }
            });

            filter_data();

            // filter data
            function filter_data() {
                var action = 'get_data';
                var priceSlider = document.getElementById('product-price-range');
                var priceValues = priceSlider.noUiSlider.get(); // Lấy giá trị min-max từ slider

                var minCost = priceValues[0];
                var maxCost = priceValues[1];

                var category = get_filter('category');
                var brand = get_filter('brand');

                $.ajax({
                    url: "{{ route('get_data') }}",
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

            var priceSlider = document.getElementById('product-price-range');

            priceSlider.noUiSlider.on('set', function(values) {
                filter_data();
            });
        });
    </script>
@endsection
