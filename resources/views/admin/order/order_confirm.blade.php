@extends('admin_layout')
@section('content_admin')
    @include('components.toast')

    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">All Order Confirm</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
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
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Created at</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Items</th>
                                            <th>Delivery Number</th>
                                            <th>Order Confirm</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_item as $item)
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="#!"
                                                        class="link-primary fw-medium">{{ $item->transaction_name }}</a>
                                                </td>
                                                <td> {{ $item->transaction_amount }}</td>
                                                <td>
                                                    @if ($item->transaction_payment == 'pay_offline')
                                                        Offline
                                                    @else
                                                        Online
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->transaction_payment == 'pay_offline')
                                                        <span class="badge bg-light text-dark  px-2 py-1 fs-13">
                                                            Unpaid
                                                        </span>
                                                    @else
                                                        @if ($item->transaction_status == 0)
                                                            <span class="badge bg-light text-dark  px-2 py-1 fs-13">
                                                                Unpaid
                                                            </span>
                                                        @elseif($item->transaction_status == 1)
                                                            <span class="badge bg-success text-light  px-2 py-1 fs-13">
                                                                Paid
                                                            </span>
                                                        @endif
                                                    @endif

                                                </td>
                                                <td>
                                                    {{ $item->orders->sum('order_qty') }}

                                                </td>
                                                <td> {{ $item->transaction_phone }}</td>

                                                <td>
                                                    @if ($item->transaction_status == 0 && $item->transaction_payment == 'pay_online')
                                                        Waiting ...
                                                    @else
                                                        <div class="d-flex gap-2">
                                                            <a href="{{ URL::to('admin/confirm-order/' . $item->transaction_id) }}"
                                                                class="btn btn-soft-success btn-sm">
                                                                <iconify-icon icon="solar:check-circle-bold"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ URL::to('admin/order-detail/' . $item->transaction_id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <iconify-icon icon="solar:eye-broken"
                                                                class="align-middle fs-18">
                                                            </iconify-icon>
                                                        </a>
                                                        <a href="{{ URL::to('admin/cancel-order/' . $item->transaction_id) }}"
                                                            class="btn btn-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18">
                                                            </iconify-icon>
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
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
