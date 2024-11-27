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
                            <h4 class="card-title flex-grow-1">All posts </h4>
                            @can('add blog')
                                <a href="{{ URL::to('admin/add-post') }}" class="btn btn-sm btn-primary">
                                    Add Post
                                </a>
                            @endcan
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Post ID</th>
                                            <th>Post Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post_item)
                                            <tr>
                                                <td>
                                                    {{ $post_item->id }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset($post_item->post_image) }}"
                                                            alt="{{ $post_item->post_image }}" class="avatar-md">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">

                                                        <p class="text-dark fw-medium fs-15 mb-0">
                                                            {{ $post_item->title }}</p>
                                                    </div>
                                                </td>

                                                <td class="truncate"
                                                    style="max-width: 80px;
                                                                    white-space: nowrap;
                                                                    overflow: hidden;
                                                                    text-overflow: ellipsis;">
                                                    {{ $post_item->post_des }}
                                                </td>
                                                <td>
                                                    {{ $post_item->category }}
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- EDIT product -->
                                                        @can('edit blog')
                                                            <a href="{{ URL::to('admin/edit-post/' . $post_item->id) }}"
                                                                class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        @endcan
                                                        <a href="{{ URL::to('admin/post-details/' . $post_item->id) }}"
                                                            class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="fluent-emoji-high-contrast:glasses"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                        <!-- DELETE product -->
                                                        @can('delete blog')
                                                            <a href="{{ URL::to('admin/delete-post/' . $post_item->id) }}"
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
                                    <span>{!! $posts->render() !!}</span>
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
