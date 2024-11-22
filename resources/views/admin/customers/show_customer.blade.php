@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.uploadpicture')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                                <div>
                                    <h4 class="mb-0">All Customers</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-muted fw-medium fs-22 mb-0">+{{ $count_customers }} Customers</p>
                                {{-- <div>
                                    <span class="badge text-success bg-success-subtle fs-12"><i
                                            class="bx bx-up-arrow-alt"></i>34.4%</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:box-bold-duotone"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                                <div>
                                    <h4 class="mb-0">Orders</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-muted fw-medium fs-22 mb-0">+{{ $count_order }} Orders</p>
                                {{-- <div>
                                    <span class="badge text-danger bg-danger-subtle fs-12"><i
                                            class="bx bx-down-arrow-alt"></i>8.1%</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:bill-list-bold-duotone"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                                <div>
                                    <h4 class="mb-0">Invoice & Payment</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-muted fw-medium fs-22 mb-0">+{{ number_format($count_invoice) . ' VND' }}</p>
                                {{-- <div>
                                    <span class="badge text-success bg-success-subtle fs-12"><i
                                            class="bx bx-up-arrow-alt"></i>45.9%</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">All Customers List</h4>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Invoice ID</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Due Date</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->deliveryAddress->fullname }}
                                                </td>
                                                <td><a href="javascript: void(0);"
                                                        class="text-body">#{{ $item->transaction_id }}</a> </td>
                                                <td>
                                                    @if ($item->transaction_status == 0 && $item->transaction_payment == 'pay_offline')
                                                        <span class="badge bg-primary-subtle text-primary py-1 px-2">
                                                            Wait confirm
                                                        </span>
                                                    @elseif($item->transaction_status == 0 && $item->transaction_payment == 'pay_online')
                                                        <span
                                                            class="badge border border-secondary text-secondary  px-2 py-1 fs-13">
                                                            Paying
                                                        </span>
                                                    @elseif($item->transaction_status == 1 && $item->transaction_payment == 'pay_online')
                                                        <span class="badge bg-primary-subtle text-primary py-1 px-2">
                                                            Wait confirm
                                                        </span>
                                                    @elseif($item->transaction_status == 2)
                                                        <span class="badge bg-success-subtle text-success py-1 px-2">
                                                            Confirmed
                                                        </span>
                                                    @elseif($item->transaction_status == 3)
                                                        <span class="badge bg-primary-subtle text-primary py-1 px-2">
                                                            Packaging
                                                        </span>
                                                    @elseif($item->transaction_status == 4)
                                                        <span class="badge bg-success-subtle text-success py-1 px-2">
                                                            Shipping
                                                        </span>
                                                    @elseif($item->transaction_status == 5)
                                                        <span class="badge bg-success-subtle text-success py-1 px-2">
                                                            Completed
                                                        </span>
                                                    @elseif($item->transaction_status == 6)
                                                        <span class="badge bg-danger-subtle text-danger px-2 py-1">
                                                            Canceled
                                                        </span>
                                                    @endif

                                                </td>
                                                <td> {{ number_format($item->transaction_amount) . ' VND' }} </td>
                                                <td> {{ $item->created_at->format('d/ m/ y') }}</td>
                                                @if ($item->transaction_payment == 'pay_offline')
                                                    <td>Cash on Delivery</td>
                                                @else
                                                    <td>Online Payment</td>
                                                @endif
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ URL::to('admin/detail-customer/' . $item->user->id) }}"
                                                            class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
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
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
