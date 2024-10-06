@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//

    <!-- Form và nội dung thêm danh mục -->

    <div class="page-content">
        <!-- Start Container Fluid -->


        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <h2 class="text-center text-primary">ADD PRODUCT DETAIL</h2>
                </div>
                <form action="{{ URL::to('/add-detail-action') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-12 col-lg-12">
                        <form action="">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Products Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($category->attributes as $item)
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category-title" class="form-label">
                                                        {{ $item->attribute_name }}: .{{ $item->category_id }}
                                                    </label>
                                                    <input type="text" name="category_name" id="category-title"
                                                        class="form-control" placeholder="Enter Value">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-outline-secondary w-100">
                                            Add Product Details
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
