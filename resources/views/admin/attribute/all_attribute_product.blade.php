@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">All Attribute List</h4>
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
                                            <th>Category</th>
                                            <th>Attributes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category_item)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $category_item->category_name }}</td>
                                                <td>
                                                    @if ($category_item->attributes->isEmpty())
                                                        <span>No attributes found</span>
                                                    @else
                                                        @foreach ($category_item->attributes as $attribute)
                                                            {{ $attribute->attribute_name }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">

                                                        @can('add product attribute')
                                                            <a href="{{ URL::to('admin/add-attribute-choice/' . $category_item->category_id) }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="material-symbols-light:add"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        @can('edit product attribute')
                                                            <a href="{{ URL::to('admin/edit-attribute-product/' . $category_item->category_id) }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        @can('delete product attribute')
                                                            <a href="{{ URL::to('admin/delete-list-attribute-action/' . $category_item->category_id) }}"
                                                                class="btn btn-soft-danger btn-sm delete-confirm">
                                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
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
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
