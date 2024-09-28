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
                <h2 class="text-center text-primary">ADD CATEGORY</h2>
            </div>
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success alert-icon" role="alert">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                                <i class="bx bx-check-shield text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                            ' . $message . '
                            </div>
                        </div>
                    </div>';
                Session::put('message', null);
            }
            ?>
            <form action="{{URL::to('/add-category-action')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 col-lg-12">
                    <form action="">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Thumbnail Photo</h4>
                            </div>
                            <div class="card-body">
                                <!-- File Upload -->

                                <div class="fallback">
                                    <label for="myFileInput" class="form-label">Choose Picture</label>
                                    <input name="category_image" class="form-control btn btn-primary" type="file" accept="image/*" id="myFileInput" onchange="previewImage(event)" />

                                </div>
                                <div class="mt-3">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 300px;" />
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="category-title" class="form-label">Category Title</label>
                                            <input type="text" name="category_name" id="category-title" class="form-control" placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control bg-light-subtle" id="description" name="category_desc" rows="7" placeholder="Type description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label">Status</label>
                                            <select class="form-control" data-choices name="category_status" id="choices-single-default">
                                                <option value="1"> Active</option>
                                                <option value="0"> Unactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <input type="submit" class="btn btn-outline-secondary w-100" value="Add Category">
                                </div>
                                <div class="col-lg-2">
                                    <a href="#!" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection