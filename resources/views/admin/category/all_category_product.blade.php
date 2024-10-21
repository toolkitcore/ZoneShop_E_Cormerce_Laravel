@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')

    <div class="page-content">
        <div class="container-xxl">

            <div class="row">
                <!-- @foreach ($categories as $category)
    <div class="col-md-6 col-xl-3">
                                                                                    <div class="card">
                                                                                        <div class="card-body text-center">
                                                                                            <div class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                                                                                                <img src="{{ asset('public/uploads/category/' . $category->category_image) }}" alt="" class="avatar-xl">
                                                                                            </div>
                                                                                            <h4 class="mt-3 mb-0">{{ $category->category_name }}</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    @endforeach -->
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Categories List</h4>

                            <a href="{{ URL::to('/add-category-product') }}" class="btn btn-sm btn-primary">
                                Add Category
                            </a>

                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter Category
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="{{ URL::to('/filter-category-root') }}" class="dropdown-item">Root</a>
                                    <!-- item-->
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1"></label>
                                                </div>
                                            </th>
                                            <th>Categories</th>
                                            <th>Parent</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div
                                                            class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('public/uploads/category/' . $category->category_image) }}"
                                                                alt="" class="avatar-md">
                                                        </div>
                                                        <p class="text-dark fw-medium fs-15 mb-0">
                                                            {{ $category->category_name }}</p>
                                                    </div>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($category->category_parent_id == null) {
                                                        echo 'Root';
                                                    } else {
                                                        foreach ($categories as $category_1) {
                                                            if ($category->category_parent_id == $category_1->category_id) {
                                                                echo $category_1->category_name;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="truncate"
                                                    style="max-width: 100px;
                                                                    white-space: nowrap;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;">
                                                    {{ $category->category_desc }}</td>
                                                <td>
                                                    <?php
                                            if ($category->category_status == 0) {
                                            ?>
                                                    <a href="{{ URL::to('/active-category-product/' . $category->category_id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                            } else {
                                            ?>
                                                    <a href="{{ URL::to('/unactive-category-product/' . $category->category_id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                            }
                                            ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- EDIT CATEGORY -->
                                                        <a href="{{ URL::to('/edit-category-product/' . $category->category_id) }}"
                                                            class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                        <!-- DELETE CATEGORY -->
                                                        <a href="{{ URL::to('/delete-category-product/' . $category->category_id) }}"
                                                            class="btn btn-soft-danger btn-sm delete-confirm"><iconify-icon
                                                                icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <div class="card-footer border-top">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end mb-0">
                                    <span>{!! $categories->render() !!}</span>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
