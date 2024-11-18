@extends('admin_layout')
@section('content_admin')
    @include('components.uploadpicture')
    @include('components.toast')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                @foreach ($list_feedback as $item)
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body bg-light-subtle rounded-bottom">
                                <a href="#" class="text-dark fw-medium fs-16">{{ $item->user->name }}</a>
                                <div class="my-1">
                                    <div class="d-flex gap-2 align-items-center">
                                        <ul class="d-flex text-warning m-0 fs-18  list-unstyled">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->rating)
                                                    <i class="bx bxs-star"></i>
                                                @else
                                                    <i class="bx bx-star"></i> <!-- Sao trống -->
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2">
                                    <span class="text-muted">{{ $item->review }}</span>
                                </h5>
                            </div>
                            <span class="position-absolute top-0 end-0 p-3">


                                <td>
                                    <?php
                                            if ($item->is_featured == 0) {
                                            ?>
                                    <a href="{{ URL::to('set-active-feedback/' . $item->id) }}" type="button"
                                        class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle">
                                        <iconify-icon icon="solar:heart-broken"></iconify-icon></a>
                                    <?php
                                            } else {
                                            ?>
                                    <a href="{{ URL::to('set-unactive-feedback/' . $item->id) }}" type="button"
                                        class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle"
                                        style="color: var(--bs-btn-hover-color);
                                                background-color: var(--bs-btn-hover-bg);
                                                border-color: var(--bs-btn-hover-border-color);">
                                        <iconify-icon icon="solar:heart-broken"></iconify-icon></a>
                                    <?php
                                        }
                                        ?>
                                </td>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
