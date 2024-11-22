@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <form action="{{ URL::to('admin/add-slider-action') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Thumbnail Photo</h4>
                            </div>
                            <div class="card-body">
                                <!-- File Upload -->
                                <div class="fallback">
                                    <label for="myFileInput" class="form-label">Choose Picture</label>
                                    <p class="ml-3 mb-3" style="font-size: 16px; line-height: 1.5; color: #333;">
                                        <strong>Image requirements:</strong><br>
                                        <span>File extension: <strong>.png</strong></span><br>
                                        <span>Size: <strong>680 x 550</strong></span><br>
                                        <span>Remove background</span><br>
                                        <span>High image quality</span>
                                    </p>

                                    <input name="product_image" class="form-control btn btn-primary" type="file"
                                        accept="image/*" id="myFileInput" onchange="previewImage(event)" />

                                </div>
                                <div class="mt-3">
                                    <img id="imagePreview" src="#" alt="Image Preview"
                                        style="display:none; max-width: 300px;" />
                                </div>

                                @error('product_image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Choice product in slider home</h4>
                            </div>
                            <div class="card-body row">
                                @foreach ($products as $item)
                                    <div class="form-check col-2">
                                        <!-- Use radio button instead of checkbox -->
                                        <input type="radio" class="form-check-input" name="product_id"
                                            value="{{ $item->product_id }}" id="customCheck{{ $item->product_id }}">
                                        <img src="{{ asset($item->product_image) }}"
                                            for="customCheck{{ $item->product_id }}" alt="" width="100px">
                                        <label for="customCheck{{ $item->product_id }}">{{ $item->product_name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('product_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <input type="submit" class="btn btn-outline-secondary w-100" value="Save">
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
