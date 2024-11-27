@extends('admin_layout')
@section('content_admin')
    <div class="page-content">

        <!-- Start Container xxl -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="bg-primary profile-bg rounded-top position-relative mx-n3 mt-n3">
                                <img src="{{ asset('public/uploads/profile/admin_profile.png') }}" alt=""
                                    class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5">
                            </div>
                            <div class="mt-5 d-flex flex-wrap align-items-center justify-content-between">
                                <div>
                                    <h4 class="mb-1">
                                        <?php
                                        echo Auth('admin')->user()->name ?? 'Guest';
                                        ?>
                                        <i class='bx bxs-badge-check text-success align-middle'></i>
                                    </h4>
                                    {{-- ROLE DEFILE --}}
                                    <p class="mb-0 text-primary bold">
                                        {{ strtoupper($role_names) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div
                                        class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:letter-bold-duotone"
                                            class="fs-20 text-secondary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 fs-14">Email <a href="#!" class="text-primary fw-semibold">
                                            <?php
                                            echo Auth('admin')->user()->email ?? 'example@gmail.com';
                                            ?>
                                        </a></p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div
                                        class="avatar-sm bg-light d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:check-circle-bold-duotone"
                                            class="fs-20 text-secondary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 fs-14">Status <span
                                            class="badge bg-success-subtle text-success ms-1">Active</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
