@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.uploadpicture')
    @include('components.confirm_delete')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="card overflow-hiddenCoupons">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover table-centered">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th>FullName</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                <span
                                                    class="badge bg-light-subtle text-muted border py-1 px-2">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                <a href="{{ URL::to('admin/detail-roles/' . $role->id) }}"
                                                    class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                            @endforeach
                                        </td>
                                        <td>
                                            <?php
                                                if ($item->is_status == 0) {
                                                ?>
                                            <a href="{{ URL::to('admin/active-account/' . $item->id) }}"
                                                class="btn btn-light btn-sm">
                                                <iconify-icon icon="mdi:cancel" class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <?php
                                                } else {
                                                ?>
                                            <a href="{{ URL::to('admin/unactive-account/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <iconify-icon icon="lets-icons:done-round-fill"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ URL::to('admin/roles-to-account/' . $item->id) }}"
                                                    class="btn btn-soft-primary btn-sm"><iconify-icon
                                                        icon="solar:pen-2-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                                <a href="{{ URL::to('admin/delete-account/' . $item->id) }}"
                                                    class="btn btn-soft-danger btn-sm delete-confirm">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
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

            </div> <!-- end card -->

        </div>
    </div>
@endsection
