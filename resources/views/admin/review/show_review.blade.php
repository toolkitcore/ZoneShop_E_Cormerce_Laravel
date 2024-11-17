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

                            <a href="{{ URL::to('/add-product') }}" class="btn btn-sm btn-primary">
                                Add Product
                            </a>

                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    This Month
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Download</a>
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Export</a>
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Import</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Products</th>
                                            <th>User</th>
                                            <th>Review</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_review as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div
                                                            class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset($item->product->product_image) }}"
                                                                alt="" class="avatar-md">
                                                        </div>
                                                        <p class="text-dark fw-medium fs-15 mb-0">
                                                            {{ $item->product->product_name }}</p>
                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $item->user->name }}
                                                </td>
                                                <td>
                                                    {{ $item->review }}
                                                </td>
                                                <td>
                                                    {{ $item->rating }}
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($item->is_approved == false) {
                                                        ?>
                                                    <a href="{{ URL::to('/active-review/' . $item->id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <a href="{{ URL::to('/unactive-review/' . $item->id) }}"
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
                                                        <a href="{{ URL::to('delete-review/' . $item->id) }}"
                                                            class="btn btn-soft-danger btn-sm delete-confirm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        {{-- <div class="card-footer border-top">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end mb-0">
                                    <span>{!! $products->render() !!}</span>
                                </ul>
                            </nav>
                        </div> --}}
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
