@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')


    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                @foreach ($edit_product as $product_item)
                    <form action="{{ URL::to('admin/update-product-action/' . $product_item->product_id) }}" method="post"
                        enctype="multipart/form-data">
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
                                        <?php
                                if ($product_item->product_image != '') {
                                ?>
                                        <img id="imagePreview" src="{{ URL::to($product_item->product_image) }}"
                                            alt="{{ $product_item->product_image }}" width="300" />
                                        <?php
                                } else {
                                ?>
                                        <img id="imagePreview" src="{{ $product_item->product_image }}"
                                            alt="{{ $product_item->product_image }}"
                                            style="display: none; max-width:300px;" />
                                        <?php
                                }
                                ?>
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
                                                    placeholder="Items Name" name="product_name"
                                                    value="{{ $product_item->product_name }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <label for="product-categories" class="form-label">Product Categories</label>
                                            <select class="form-control" id="product-categories" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="category_id">
                                                @foreach ($categories as $category_item)
                                                    @if ($category_item->category_id == $product_item->category_id)
                                                        <option value="{{ $category_item->category_id }}" selected>
                                                            {{ $category_item->category_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $category_item->category_id }}">
                                                            {{ $category_item->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-lg-6">

                                            <label for="product-categories" class="form-label">Product Brands</label>
                                            <select class="form-control" id="product-categories" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="brand_id">
                                                @foreach ($brands as $brand_item)
                                                    @if ($brand_item->brand_id == $product_item->brand_id)
                                                        <option value="{{ $brand_item->brand_id }}" selected>
                                                            {{ $brand_item->brand_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $brand_item->brand_id }}">
                                                            {{ $brand_item->brand_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control bg-light-subtle" id="description" rows="7" name="product_description">
                                                    {{ $product_item->product_description }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="product-stock" class="form-label">Stock</label>
                                                <input type="number" min=1 id="product-stock" class="form-control"
                                                    placeholder="Quantity" name="product_quantity"
                                                    value="{{ $product_item->product_quantity }}">
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
                                                    placeholder="000" name="product_price_original"
                                                    value="{{ $product_item->product_price_original }}">
                                            </div>

                                        </div>
                                        <div class="col-lg-6">

                                            <label for="product-price" class="form-label">Price Selling</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                                <input type="number" min=1 id="product-price" class="form-control"
                                                    placeholder="000" name="product_price_selling"
                                                    value="{{ $product_item->product_price_selling }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        {{-- <a href="submit" class="btn btn-outline-secondary w-100">Create Product</a> --}}
                                        <input type="submit" class="btn btn-outline-secondary w-100"
                                            value="Update Product">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#!" class="btn btn-primary w-100">Cancel</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
