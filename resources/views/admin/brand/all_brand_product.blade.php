@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//
    @include('components.confirm_delete')//


    <div class="page-content">
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Brand List</h4>

                            @can('add brand')
                                <a href="{{ URL::to('admin/add-brand-product') }}" class="btn btn-sm btn-primary">
                                    Add Brand
                                </a>
                            @endcan
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
                                            <th>Brand</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <p class="text-dark fw-medium fs-15 mb-0">{{ $brand->brand_name }}
                                                        </p>
                                                    </div>

                                                </td>
                                                <td class="truncate"
                                                    style="max-width: 100px;
                                                                    white-space: nowrap;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;">
                                                    {{ $brand->brand_desc }}</td>
                                                <td>
                                                    <?php
                                            if ($brand->brand_status == 0) {
                                            ?>
                                                    <a href="{{ URL::to('admin/active-brand-product/' . $brand->brand_id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                            } else {
                                            ?>
                                                    <a href="{{ URL::to('admin/unactive-brand-product/' . $brand->brand_id) }}"
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
                                                        @can('edit brand')
                                                            <!-- EDIT brand -->
                                                            <a href="{{ URL::to('admin/edit-brand-product/' . $brand->brand_id) }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        @can('delete brand')
                                                            <!-- DELETE brand -->
                                                            <a href="{{ URL::to('admin/delete-brand-product/' . $brand->brand_id) }}"
                                                                class="btn btn-soft-danger btn-sm delete-confirm"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon></a>
                                                        @endcan
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
                                    <span>{!! $brands->render() !!}</span>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
