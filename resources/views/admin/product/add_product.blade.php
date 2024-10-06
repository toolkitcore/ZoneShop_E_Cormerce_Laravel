@extends('admin_layout')
@section('content_admin')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-3 col-lg-4">
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
                </div>

                <div class="col-xl-9 col-lg-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product Photo</h4>
                        </div>
                        <div class="card-body">
                            <!-- File Upload -->
                            <form action="####" method="post" class="dropzone" id="myAwesomeDropzone"
                                data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dz-message needsclick">
                                    <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                    <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to
                                            browse</span></h3>
                                    <span class="text-muted fs-13">
                                        1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                                    </span>
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
                                            placeholder="Items Name">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <label for="product-categories" class="form-label">Product Categories</label>
                                    <select class="form-control" id="product-categories" data-choices data-choices-groups
                                        data-placeholder="Select Categories" name="choices-single-groups">
                                        <option value="">Choose a categories</option>
                                    </select>

                                </div>
                                <div class="col-lg-6">

                                    <label for="product-categories" class="form-label">Product Brands</label>
                                    <select class="form-control" id="product-categories" data-choices data-choices-groups
                                        data-placeholder="Select Categories" name="choices-single-groups">
                                        <option value="">Choose a categories</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control bg-light-subtle" id="description" rows="7"
                                            placeholder="Short description about the product"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="product-stock" class="form-label">Stock</label>
                                        <input type="number" min=1 id="product-stock" class="form-control"
                                            placeholder="Quantity">
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
                                            placeholder="000">
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <label for="product-price" class="form-label">Price Selling</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                        <input type="number" min=1 id="product-price" class="form-control"
                                            placeholder="000">
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
                                            placeholder="000">
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <label for="product-price" class="form-label">Price Selling</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                        <input type="number" min=1 id="product-price" class="form-control"
                                            placeholder="000">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="#!" class="btn btn-outline-secondary w-100">Create Product</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#!" class="btn btn-primary w-100">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
