@extends('admin_layout')
@section('content_admin')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <script>
            function previewImage(event) {
                const imagePreview = document.getElementById('imagePreview');
                const file = event.target.files[0]; // Lấy file đầu tiên trong danh sách file

                if (file) {
                    const reader = new FileReader(); // Tạo FileReader để đọc file
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result; // Gán đường dẫn hình ảnh cho src của thẻ img
                        imagePreview.style.display = 'block'; // Hiển thị thẻ img
                    };
                    reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
                }
            }
        </script>

        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <h2 class="text-center text-primary">UPDATE CATEGORY</h2>
                </div>

                @foreach ($edit_category_product as $category_item)
                    <form action="{{ URL::to('/update-category-action/' . $category_item->category_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Thumbnail Photo</h4>
                                </div>
                                <div class="card-body">
                                    <!-- File Upload -->

                                    <div class="fallback">
                                        <label for="myFileInput" class="form-label">Choose Picture</label>
                                        <input name="category_image" class="form-control btn btn-primary" type="file"
                                            accept="image/*" id="myFileInput" onchange="previewImage(event)" />
                                    </div>
                                    <div class="mt-3">
                                        <?php
                                if ($category_item->category_image != '') {
                                ?>
                                        <img id="imagePreview"
                                            src="{{ URL::to('public/uploads/category/' . $category_item->category_image) }}"
                                            alt="{{ 'uploads/category/' . $category_item->category_image }}"
                                            width="300" />
                                        <?php
                                } else {
                                ?>
                                        <img id="imagePreview"
                                            src="{{ 'public/uploads/category/' . $category_item->category_image }}"
                                            alt="{{ 'public/uploads/category/' . $category_item->category_image }}"
                                            style="display: none; max-width:300px;" />
                                        <?php
                                }
                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category-title" class="form-label">Category Title</label>
                                                <input type="text" value="{{ $category_item->category_name }}"
                                                    name="category_name" id="category-title" class="form-control"
                                                    placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category-title" class="form-label">Category Parent</label>
                                                <select class="form-control" data-choices name="category_parent_id"
                                                    id="choices-single-default">
                                                    <option value="">
                                                        Root
                                                    </option>
                                                    <!-- LIST CATEGORY_PARENT -->
                                                    @foreach ($categories as $category_item_1)
                                                        @if ($category_item->category_parent_id == $category_item_1->category_id)
                                                            <option value="{{ $category_item_1->category_id }}" selected>
                                                                {{ $category_item_1->category_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $category_item_1->category_id }}">
                                                                {{ $category_item_1->category_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control bg-light-subtle" id="description" name="category_desc" rows="7"
                                                    placeholder="Type description">{{ $category_item->category_desc }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Category Order</label>
                                                <input type="number" class="form-control " name="category_sort_order"
                                                    id="" min=1 value="{{ $category_item->category_sort_order }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_category"
                                            class="btn btn-outline-secondary w-100">Update Category</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#!" class="btn btn-primary w-100">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
