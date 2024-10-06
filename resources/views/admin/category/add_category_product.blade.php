@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.uploadpicture')

    <!-- Form và nội dung thêm danh mục -->

    <div class="page-content">
        <!-- Start Container Fluid -->

        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <h2 class="text-center text-primary">ADD CATEGORY</h2>
                </div>

                <form action="{{ URL::to('/add-category-action') }}" method="post" enctype="multipart/form-data">
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
                                        <input name="category_image" class="form-control btn btn-primary" type="file"
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
                                    <h4 class="card-title">General Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category-title" class="form-label">Category Title</label>
                                                <input type="text" name="category_name" id="category-title"
                                                    class="form-control" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category-title" class="form-label">Category Parent</label>
                                                <select class="form-control" data-choices name="category_parent_id"
                                                    id="choices-single-default">
                                                    <option value=""> Root</option>
                                                    <!-- LIST CATEGORY_PARENT -->
                                                    @foreach ($categories as $category_item)
                                                        <option value="{{ $category_item->category_id }}">
                                                            {{ $category_item->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control bg-light-subtle" id="description" name="category_desc" rows="7"
                                                    placeholder="Type description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Status</label>
                                                <select class="form-control" data-choices name="category_status"
                                                    id="choices-single-default">
                                                    <option value="1"> Active</option>
                                                    <option value="0"> Unactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Category Order</label>
                                                <input type="number" class="form-control " name="category_sort_order"
                                                    id="" min=1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">

                                        <button type="submit" class="btn btn-outline-secondary w-100">
                                            Add Category
                                        </button>
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
