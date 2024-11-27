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
                                    <th>Name Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_roles as $item)
                                    <tr>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            @php
                                                $permissions = $item->permissions->take(5);
                                                $hasMore = $item->permissions->count() > 5;
                                            @endphp

                                            @foreach ($permissions as $permission)
                                                <span
                                                    class="badge bg-light-subtle text-muted border py-1 px-2">{{ $permission->name }}</span>
                                            @endforeach

                                            @if ($hasMore)
                                                <span class="badge bg-light-subtle text-muted border py-1 px-2">...</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ URL::to('admin/detail-roles/' . $item->id) }}"
                                                    class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                                <a href="{{ URL::to('admin/edit-roles-action/' . $item->id) }}"
                                                    class="btn btn-soft-primary btn-sm"><iconify-icon
                                                        icon="solar:pen-2-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                                <a href="{{ URL::to('admin/delete-roles-action/' . $item->id) }}"
                                                    class="btn btn-soft-danger btn-sm delete-confirm"><iconify-icon
                                                        icon="solar:trash-bin-minimalistic-2-broken"
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
