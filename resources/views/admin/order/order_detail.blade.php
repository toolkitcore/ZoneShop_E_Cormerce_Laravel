@extends('admin_layout')
@section('content_admin')
    @include('components.toast')

    <div class="page-content">

        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <div>
                                            <h4 class="fw-medium text-dark d-flex align-items-center gap-2">#Id Order:
                                                {{ $transaction_item->transaction_id }}
                                            </h4>
                                            <p class="mb-0">Order / Order Details /
                                                {{ $transaction_item->transaction_id }} -
                                                {{ $transaction_item->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                    @if ($transaction_item->transaction_status == '6')
                                        <div class="mt-4">
                                            <h4 class="fw-medium text-primary">The order has been canceled !!!</h4>
                                        </div>
                                    @else
                                        <div class="mt-4">
                                            <h4 class="fw-medium text-dark">Progress</h4>
                                        </div>
                                        <div class="row row-cols-xxl-5 row-cols-md-2 row-cols-1">
                                            @if ($transaction_item->transaction_payment == 'pay_online')
                                                @if ($transaction_item->transaction_status == 0)
                                                    <div class="col">
                                                        <div class="progress mt-3" style="height: 10px;">
                                                            <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                                                                role="progressbar" style="width: 50%" aria-valuenow="70"
                                                                aria-valuemin="0" aria-valuemax="70">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2 mt-2">
                                                            <p class="mb-0">Payment ...</p>
                                                            <div class="spinner-border spinner-border-sm text-warning"
                                                                role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <div class="progress mt-3" style="height: 10px;">
                                                            <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                                role="progressbar" style="width: 100%" aria-valuenow="70"
                                                                aria-valuemin="0" aria-valuemax="70">
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 mt-2">Payment success</p>
                                                    </div>
                                                @endif
                                            @endif

                                            @if ($transaction_item->transaction_status == 1)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated   bg-warning"
                                                            role="progressbar" style="width: 50%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-2">
                                                        <p class="mb-0">Confirming ... </p>
                                                        <div class="spinner-border spinner-border-sm text-warning"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($transaction_item->transaction_status == 0 && $transaction_item->transaction_payment == 'pay_offline')
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated   bg-warning"
                                                            role="progressbar" style="width: 50%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-2">
                                                        <p class="mb-0">Confirming ... </p>
                                                        <div class="spinner-border spinner-border-sm text-warning"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($transaction_item->transaction_status == 0 && $transaction_item->transaction_payment == 'pay_online')
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated   bg-warning"
                                                            role="progressbar" style="width: 0%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Order Confirming</p>
                                                </div>
                                            @else
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated   bg-success"
                                                            role="progressbar" style="width: 100%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Order Confirming</p>
                                                </div>
                                            @endif

                                            @if ($transaction_item->transaction_status == 2)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                                                            role="progressbar" style="width: 60%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-2">
                                                        <p class="mb-0">Processing</p>
                                                        <div class="spinner-border spinner-border-sm text-warning"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($transaction_item->transaction_status == 0 || $transaction_item->transaction_status == 1)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                            role="progressbar" style="width: 0%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Processing Package</p>
                                                </div>
                                            @else
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                            role="progressbar" style="width: 100%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Processing Package</p>
                                                </div>
                                            @endif

                                            @if ($transaction_item->transaction_status == 3)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                                                            role="progressbar" style="width: 50%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-2">
                                                        <p class="mb-0">Shipping...</p>
                                                        <div class="spinner-border spinner-border-sm text-warning"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif(
                                                $transaction_item->transaction_status == 0 ||
                                                    $transaction_item->transaction_status == 1 ||
                                                    $transaction_item->transaction_status == 2)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                            role="progressbar" style="width: 0%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Shipping</p>
                                                </div>
                                            @else
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                            role="progressbar" style="width: 100%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Shipping</p>
                                                </div>
                                            @endif

                                            @if ($transaction_item->transaction_status == 4)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                                                            role="progressbar" style="width: 50%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-2">
                                                        <p class="mb-0">Delivering...</p>
                                                        <div class="spinner-border spinner-border-sm text-warning"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($transaction_item->transaction_status == 5)
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-success"
                                                            role="progressbar" style="width: 100%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Delivered</p>
                                                </div>
                                            @else
                                                <div class="col">
                                                    <div class="progress mt-3" style="height: 10px;">
                                                        <div class="progress-bar progress-bar  progress-bar-striped progress-bar-animated bg-primary"
                                                            role="progressbar" style="width: 0%" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="70">
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 mt-2">Delivered</p>
                                                </div>
                                            @endif

                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="card-footer d-flex flex-wrap align-items-center justify-content-between bg-light-subtle gap-2">
                                    @if ($transaction_item->transaction_status == 0 && $transaction_item->transaction_payment == 'pay_offline')
                                        <div>
                                            <a href="{{ URL::to('confirm-order/' . $transaction_item->transaction_id) }}"
                                                class="btn btn-primary">Confirm Order</a>
                                        </div>
                                    @elseif ($transaction_item->transaction_status == 1 && $transaction_item->transaction_payment == 'pay_online')
                                        <div>
                                            <a href="{{ URL::to('confirm-order/' . $transaction_item->transaction_id) }}"
                                                class="btn btn-primary">Confirm Order</a>
                                        </div>
                                    @elseif($transaction_item->transaction_status == 2)
                                        <div>
                                            <a href="{{ URL::to('confirm-package/' . $transaction_item->transaction_id) }}"
                                                class="btn btn-primary">Confirm
                                                Package</a>
                                        </div>
                                    @elseif($transaction_item->transaction_status == 3)
                                        <div>
                                            <a href="{{ URL::to('confirm-ship/' . $transaction_item->transaction_id) }}"
                                                class="btn btn-primary">Confirm Ship</a>
                                        </div>
                                    @elseif($transaction_item->transaction_status == 4)
                                        <div>
                                            <a href="{{ URL::to('confirm-completed/' . $transaction_item->transaction_id) }}"
                                                class="btn btn-primary">Confirm
                                                Completed</a>
                                        </div>
                                    @endif

                                    @if ($transaction_item->transaction_status >= 2 && $transaction_item->transaction_status <= 6)
                                        <div class="card-invoices">
                                            <a class="btn btn-primary"
                                                href="{{ URL::to('order/invoice/' . $transaction_item->transaction_id) }}"
                                                target="_blank">
                                                <iconify-icon icon="hugeicons:view" wtransaction_idth="1.2em"
                                                    height="1.2em"></iconify-icon> View invoice</a>
                                            <a class="btn btn-primary"
                                                href="{{ URL::to('order/invoice/' . $transaction_item->transaction_id . '/generate') }}">
                                                <iconify-icon icon="material-symbols:download" width="1.2em"
                                                    height="1.2em"></iconify-icon>
                                                Dowload Invoice
                                            </a>
                                            <a class="btn btn-primary"
                                                href="{{ URL::to('order/invoice/' . $transaction_item->transaction_id . '/mail') }}">
                                                Send Invoice
                                            </a>
                                        </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Product</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0 table-hover table-centered">
                                            <thead class="bg-light-subtle border-bottom">
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction_item->orders as $order_item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div
                                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                    <img src="{{ asset($order_item->product->product_image) }}"
                                                                        alt="" class="avatar-md">
                                                                </div>
                                                                <div>
                                                                    <a href="#!"
                                                                        class="text-dark fw-medium fs-15">{{ $order_item->order_product_name }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> {{ $order_item->order_qty }}</td>
                                                        <td>{{ number_format($order_item->order_price) . ' VND' }}</td>
                                                        <td>
                                                            {{ number_format($order_item->order_amount) . ' VND' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="px-0">
                                                <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                        icon="solar:clipboard-text-broken"></iconify-icon> Sub Total : </p>
                                            </td>
                                            <td class="text-end text-dark fw-medium px-0">
                                                {{ number_format($transaction_item->orders->sum('order_amount')) . ' VND' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                        icon="solar:kick-scooter-broken"
                                                        class="align-middle"></iconify-icon>
                                                    Delivery Charge : </p>
                                            </td>
                                            <td class="text-end text-dark fw-medium px-0">
                                                {{ number_format($transaction_item->transaction_amount - $transaction_item->orders->sum('order_amount')) . ' VND' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                            <div>
                                <p class="fw-medium text-dark mb-0">Total Amount</p>
                            </div>
                            <div>
                                <p class="fw-medium text-dark mb-0">
                                    {{ number_format($transaction_item->transaction_amount) . ' VND' }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div>
                                    <p class="mb-1">{{ $transaction_item->transaction_name }}</p>
                                    <a href="#!"
                                        class="link-primary fw-medium">{{ $transaction_item->transaction_email }}</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h5 class="">Contact Number</h5>
                            </div>
                            <p class="mb-1">{{ $transaction_item->transaction_phone }}</p>

                            <div class="d-flex justify-content-between mt-3">
                                <h5 class="">Shipping Address</h5>
                            </div>

                            <div>
                                <p class="mb-1">{{ $transaction_item->deliveryAddress->address }},</p>
                                <p class="mb-1">{{ $transaction_item->deliveryAddress->ward }},</p>
                                <p class="mb-1">{{ $transaction_item->deliveryAddress->district }},</p>
                                <p class="mb-1">{{ $transaction_item->deliveryAddress->province }},</p>
                                <p class="">{{ $transaction_item->transaction_phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
