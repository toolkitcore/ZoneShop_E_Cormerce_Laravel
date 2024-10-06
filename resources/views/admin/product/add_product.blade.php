@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')


    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                {{-- <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ 'public/BackEnd/images/product/p-1.png' }}" alt=""
                                class="img-fluid rounded bg-light">
                            <div class="mt-3">
                                <h4>Men Black Slim Fit T-shirt <span class="fs-14 text-muted ms-1">(Fashion)</span></h4>
                                <h5 class="text-dark fw-medium mt-3">Price :</h5>
                                <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2">
                                    <span class="text-muted text-decoration-line-through">$100</span> $80 <small
                                        class="text-muted"> (30% Off)</small>
                                </h4>
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Size :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="size-s">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="size-s">S</label>

                                        <input type="checkbox" class="btn-check" id="size-m" checked>
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="size-m">M</label>

                                        <input type="checkbox" class="btn-check" id="size-xl">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="size-xl">Xl</label>

                                        <input type="checkbox" class="btn-check" id="size-xxl">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="size-xxl">XXL</label>

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Colors :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="color-dark">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="color-dark"> <i class="bx bxs-circle fs-18 text-dark"></i></label>

                                        <input type="checkbox" class="btn-check" id="color-yellow">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="color-yellow"> <i class="bx bxs-circle fs-18 text-warning"></i></label>

                                        <input type="checkbox" class="btn-check" id="color-white">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="color-white"> <i class="bx bxs-circle fs-18 text-white"></i></label>

                                        <input type="checkbox" class="btn-check" id="color-red">
                                        <label
                                            class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                            for="color-red"> <i class="bx bxs-circle fs-18 text-danger"></i></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <a href="#!" class="btn btn-outline-secondary w-100">Create Product</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#!" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <form action="{{ URL::to('/add-product-action') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-9 col-lg-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Thumbnail Photo</h4>
                            </div>
                            <div class="card-body">
                                <!-- File Upload -->

                                <div class="fallback">
                                    <label for="myFileInput" class="form-label">Choose Picture</label>
                                    <input name="product_image" class="form-control btn btn-primary" type="file"
                                        accept="image/*" id="myFileInput" onchange="previewImage(event)" />

                                </div>
                                <div class="mt-3">
                                    <img id="imagePreview" src="#" alt="Image Preview"
                                        style="display:none; max-width: 300px;" />
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Product Name</label>
                                            <input type="text" id="product-name" class="form-control"
                                                placeholder="Items Name" name="product_name">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <label for="product-categories" class="form-label">Product Categories</label>
                                        <select class="form-control" id="product-categories" data-choices
                                            data-choices-groups data-placeholder="Select Categories" name="category_id">
                                            @foreach ($categories as $category_item)
                                                <option value="{{ $category_item->category_id }}">
                                                    {{ $category_item->category_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-6">

                                        <label for="product-categories" class="form-label">Product Brands</label>
                                        <select class="form-control" id="product-categories" data-choices
                                            data-choices-groups data-placeholder="Select Categories" name="brand_id">
                                            @foreach ($brands as $brand_item)
                                                <option value="{{ $brand_item->brand_id }}">{{ $brand_item->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control bg-light-subtle" id="description" rows="7"
                                                placeholder="Short description about the product" name="product_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-stock" class="form-label">Stock</label>
                                            <input type="number" min=1 id="product-stock" class="form-control"
                                                placeholder="Quantity" name="product_quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-0">
                                            <label for="description" class="form-label">Status</label>
                                            <select class="form-control" data-choices name="product_status"
                                                id="choices-single-default">
                                                <option value="1"> Active</option>
                                                <option value="0"> Unactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pricing Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <label for="product-price" class="form-label">Price Original</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                            <input type="number" min=1 id="product-price" class="form-control"
                                                placeholder="000" name="product_price_original">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <label for="product-price" class="form-label">Price Selling</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                            <input type="number" min=1 id="product-price" class="form-control"
                                                placeholder="000" name="product_price_selling">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    {{-- <a href="submit" class="btn btn-outline-secondary w-100">Create Product</a> --}}
                                    <input type="submit" class="btn btn-outline-secondary w-100" value="Create Product">
                                </div>
                                <div class="col-lg-2">
                                    <a href="#!" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
