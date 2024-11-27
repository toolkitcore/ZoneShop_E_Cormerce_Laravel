@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//

    <div class="page-content">
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Images List</h4>

                            @can('add product image')
                                <a href="{{ URL::to('admin/add-product-image') }}" class="btn btn-sm btn-primary">
                                    Add Product Images
                                </a>
                            @endcan
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $item->product_name }} </td>
                                                <td>{{ $item->category->category_name }} </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        @foreach ($product_images as $item_picture)
                                                            @if ($item_picture->product_id == $item->product_id)
                                                                <div
                                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                    <img src="{{ asset($item_picture->image_name) }}"
                                                                        alt="" class="avatar-md">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        @can('add product image')
                                                            <a href="{{ 'add-product-images/' . $item->product_id }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="material-symbols-light:add"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        <!-- DELETE Images -->
                                                        @can('delete product image')
                                                            <a href="{{ 'delete-product-images/' . $item->product_id }}"
                                                                class="btn btn-soft-danger btn-sm"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-2-broken"
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
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
