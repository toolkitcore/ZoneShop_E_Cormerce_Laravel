@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Thumbnail Photo</h4>
                            </div>
                            <div class="card-body">
                                <!-- File Upload -->

                                <div class="fallback">
                                    <label for="myFileInput" class="form-label">Choose Picture Post</label>
                                    <input name="post_image" class="form-control btn btn-primary" type="file"
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
                                <h4 class="card-title">Post General Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Post title</label>
                                            <input type="text" id="post_title" class="form-control"
                                                placeholder="Items Name" name="post_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="post_title" class="form-label">Post Description</label>
                                            <textarea id="post_des" class="form-control" placeholder="Post Description" name="post_des"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="product-categories" class="form-label">Choose Category for Post</label>
                                        <select class="form-control" id="product-categories"
                                            data-placeholder="Select Categories" name="category_id">
                                            @foreach ($category as $category_item)
                                                <option value="{{ $category_item->category_id }}">
                                                    {{ $category_item->category_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <h5 class="card-title mb-1 anchor" id="quill-snow-editor">
                                        Post Content
                                    </h5>
                                    <div class="mb-2">
                                        <div id="snow-editor" style="height: 400px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        <input type="button" class="btn btn-outline-secondary w-100" id="add_post"
                                            value="Add Post">
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
    <script>
        $(document).on('click', '#add_post', function(e) {
            e.preventDefault();

            // Lấy nội dung từ Quill editor dưới dạng HTML
            var htmlContent = quill.root.innerHTML;

            // Tạo đối tượng FormData từ form
            var formData = new FormData($('form')[0]);

            // Thêm dữ liệu Quill editor vào FormData dưới dạng HTML
            formData.append('content', htmlContent);

            // Thêm dữ liệu title, category_id và post_image vào FormData
            formData.append('post_title', $('#post_title').val());
            formData.append('category_id', $('#product-categories').val());
            formData.append('post_des', $('#post_des').val());
            formData.append('post_image', $('#myFileInput')[0].files[0]); // Lấy file ảnh đã chọn

            // Lấy CSRF token từ meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Gửi AJAX request để lưu post
            $.ajax({
                url: '{{ route('posts.store') }}', // Đường dẫn tới route store trong Laravel
                method: 'POST',
                data: formData,
                contentType: false, // Không gửi theo kiểu form mặc định
                processData: false, // Không xử lý dữ liệu trước khi gửi
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Thêm CSRF token vào header
                },
                success: function(response) {
                    alert('Post added successfully');
                    window.location.href = response.redirect_url; // Điều hướng đến trang mới nếu cần
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    </script>
@endsection
