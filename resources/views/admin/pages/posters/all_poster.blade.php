@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')

    <style>
        .avatar-md {
            height: 3.5rem;
            width: auto;
        }
    </style>
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Product of posters </h4>

                            <a href="{{ URL::to('/add-posters') }}" class="btn btn-sm btn-primary">
                                Add item
                            </a>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Image poster</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posters as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div
                                                            class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset($item->poster_image) }}" alt=""
                                                                class="avatar-md" width="200px">
                                                        </div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <?php
                                                        if ($item->poster_status == 0) {
                                                        ?>
                                                    <a href="{{ URL::to('/active-poster/' . $item->id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <?php
                                                        } else {
                                                        ?>
                                                    <a href="{{ URL::to('/unactive-poster/' . $item->id) }}"
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
                                                        <a href="{{ URL::to('delete-poster/' . $item->id) }}"
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
                                    <span>{!! $items->render() !!}</span>
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
