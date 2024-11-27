@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')

    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Products </h4>

                            @can('add product')
                                <a href="{{ URL::to('admin/add-product') }}" class="btn btn-sm btn-primary">
                                    Add Product
                                </a>
                            @endcan


                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Products</th>
                                            <th>Description</th>
                                            <th>Price Original</th>
                                            <th>Price Selling</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div
                                                            class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset($product->product_image) }}" alt=""
                                                                class="avatar-md">
                                                        </div>
                                                        <p class="text-dark fw-medium fs-15 mb-0">
                                                            {{ $product->product_name }}</p>
                                                    </div>
                                                </td>

                                                <td class="truncate"
                                                    style="max-width: 80px;
                                                                    white-space: nowrap;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;">
                                                    {{ $product->product_description }}
                                                </td>
                                                <td>
                                                    {{ $product->product_price_original }}
                                                </td>
                                                <td>
                                                    {{ $product->product_price_selling }}
                                                </td>
                                                <td>
                                                    {{ $product->product_quantity }}
                                                </td>
                                                <td>
                                                    {{ $product->category->category_name }}
                                                </td>
                                                <td>
                                                    {{ $product->brand->brand_name }}
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($product->product_status == 0) {
                                                        ?>
                                                    <a href="{{ URL::to('admin/active-product/' . $product->product_id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <a href="{{ URL::to('admin/unactive-product/' . $product->product_id) }}"
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
                                                        <!-- EDIT product -->
                                                        @can('edit product')
                                                            <a href="{{ URL::to('admin/edit-product/' . $product->product_id) }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        <a href="{{ URL::to('admin/product-details/' . $product->product_id) }}"
                                                            class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="fluent-emoji-high-contrast:glasses"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                        <!-- DELETE product -->
                                                        @can('delete product')
                                                            <a href="{{ URL::to('admin/delete-product/' . $product->product_id) }}"
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
                                    <span>{!! $products->render() !!}</span>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('[id^="delete-product-"]');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default action

                    const url = this.href; // Get the link's URL

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                        cancelButtonClass: 'btn btn-danger w-xs mt-2',
                        buttonsStyling: false,
                        showCloseButton: false
                    }).then(function(result) {
                        if (result.value) {
                            // If confirmed, redirect to the delete URL
                            window.location.href = url;
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: 'Cancelled',
                                text: 'Your product is safe :)',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-primary mt-2',
                                buttonsStyling: false
                            });
                        }
                    });
                });
            });
        });
    </script>
@endsection
