@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')
    {{-- <script defer>
        function updateCard() {
            // Get input values from the form
            const productName = document.getElementById('product-name').value;
            const productCategory = document.getElementById('product-category').value;
            const productBrand = document.getElementById('product-brand').value;
            const productDescription = document.getElementById('product-description').value;
            const productQuantity = document.getElementById('product-quantity').value;
            const productStatus = document.getElementById('product-status').value;
            const productPriceOriginal = document.getElementById('product-price-original').value;
            const productPriceSelling = document.getElementById('product-price-selling').value;
            const productDiscount = ((productPriceOriginal - productPriceSelling) / productPriceOriginal) * 100;
            const productImage = document.getElementById('product-image').value;

            // Update the card fields dynamically
            document.getElementById('card-product-name').innerText = productName;
            document.getElementById('card-product-category').innerText = productCategory;
            document.getElementById('card-product-brand').innerText = productBrand;
            document.getElementById('card-product-description').innerText = productDescription;
            document.getElementById('card-product-quantity').innerText = productQuantity;
            document.getElementById('card-product-status').innerText = productStatus;
            document.getElementById('card-product-price-original').innerText = productPriceOriginal;
            document.getElementById('card-product-price-selling').innerText = productPriceSelling;
            document.getElementById('card-product-discount').innerText = productDiscount;
            document.getElementById('card-product-image').src = productImage;

        }
    </script> --}}

    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                {{-- <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="bg-light text-center rounded bg-light">
                                <img src="{{ asset('public/BackEnd/images/product/p-1.png') }}" alt=""
                                    class="avatar-xxl">
                            </div>
                            <div class="mt-3">
                                <h4 id="card-product-name">Name Product</h4>
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <p class="mb-1 mt-2">Price :</p>
                                        <h3 class="mb-0">
                                            <span class="text-muted text-decoration-line-through"
                                                id="card-product-price-original">100</span>
                                            <span id="card-product-price-selling">500</span>
                                            <small class="text-muted" id="card-product-discount">(Off 30%)</small>
                                            </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <p class="mb-1 mt-2">Category :</p>
                                        <h5 class="mb-0" id="card-product-category">Name Category</h5>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <p class="mb-1 mt-2">Brand :</p>
                                        <h5 class="mb-0" id="card-product-brand">Name Brand</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <p class="mb-1 mt-2">Stock :</p>
                                        <h5 class="mb-0" id="card-product-quantity">10000</h5>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <p class="mb-1 mt-2">Status :</p>
                                        <h5 class="mb-0" id="card-product-status">Active/Unactive</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <p class="mb-1 mt-2">Description :</p>
                                        <h5 class="mb-0" id="card-product-description">Lorem ipsum dolor sit, amet
                                            consectetur adipisicing elit.
                                            Quisquam eaque asperiores dignissimos aliquam minus? </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-xl-12 col-lg-12 ">
                    <form action="{{ URL::to('/add-product-action') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                {{-- <div class="col-lg-2">
                                    <button onclick="updateCard()" class="btn btn-outline-secondary w-100">Demo </button>
                                </div> --}}
                                <div class="col-lg-2">
                                    <input type="submit" class="btn btn-outline-secondary w-100"
                                        value="Save & Continue">
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
