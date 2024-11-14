<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: "DejaVu Sans Mono", monospace;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .wrapper {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card Styling */
    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-body {
        padding: 30px;
    }

    /* Title and Logo */
    .auth-logo img {
        height: 30px;
    }

    h4 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        margin-left: 10px;
        font-weight: 600;
    }

    .card-title {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    /* Table Styling */
    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .position-absolute.top-100.start-50.translate-middle {
        display: flex;
        justify-content: center;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f1f1f1;
        font-weight: 600;
    }

    .table td {
        font-size: 1rem;
    }

    .table .text-end {
        text-align: right;
    }

    .table .badge {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 0.9rem;
    }

    /* Invoice Details Section */
    .bg-info-subtle {
        background-color: #e7f3f3;
    }

    .bg-light {
        background-color: #f7f7f7;
    }

    .bg-opacity-50 {
        opacity: 0.5;
    }

    .text-dark {
        color: #343a40;
    }

    .fw-semibold {
        font-weight: 600;
    }

    .fw-medium {
        font-weight: 500;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {

        .float-sm-start,
        .float-sm-end {
            float: none;
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }
    }

    /* Invoice Summary */
    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
    }

    .table .text-end {
        text-align: right;
    }

    .table td {
        font-size: 0.95rem;
    }

    .text-decoration-underline {
        text-decoration: underline;
    }

    /* Add some spacing and better display for addresses */
    .mt-3 {
        margin-top: 15px;
    }

    .mb-2 {
        margin-bottom: 10px;
    }

    /* Button Styling */
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Avatar Style */
    .avatar {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }

    address.mt-3.mb-0 {
        margin-left: 2rem;
    }

    /* Badge Styles for Payment Status */
    .bg-success {
        background-color: #28a745;
    }

    .bg-secondary {
        background-color: #6c757d;
    }
</style>

<body>
    <div class="wrapper">

        <div class="card">
            <div class="card-body">
                <!-- Logo & title -->
                <div class="clearfix pb-3 bg-info-subtle p-lg-3 p-2 m-n2 rounded position-relative">
                    <div class="float-sm-start">
                        <div class="auth-logo">
                            <img class="logo-dark me-1" src="{{ asset('public/BackEnd/images/logo-dark.png') }}"
                                alt="logo-dark" height="24" />
                        </div>
                    </div>
                    <div class="float-sm-end">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0 text-dark fw-semibold"> Invoice : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold px-0 py-1">
                                            #ID-{{ $transaction->transaction_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Issue Date: </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">
                                            {{ date('d / m / Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium px-0 py-1">
                                            {{ number_format($transaction->transaction_amount) . ' VND' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Pay method : </p>
                                        </td>
                                        @if ($transaction->transaction_payment == 'pay_offline')
                                            <td class="text-end text-dark fw-medium px-0 py-1">
                                                Cash on Delivery
                                            </td>
                                        @else
                                            <td class="text-end text-dark fw-medium px-0 py-1">
                                                Online Payment</td>
                                        @endif

                                    </tr>
                                    <tr>
                                        <td class="p-0 pe-5 py-1">
                                            <p class="mb-0">Status : </p>
                                        </td>
                                        @if ($transaction->transaction_payment == 'pay_offline')
                                            <td class="text-end px-0 py-1"><span
                                                    class="badge bg-secondary text-white  px-2 py-1 fs-13">Not
                                                    Paid</span>
                                            </td>
                                        @else
                                            <td class="text-end px-0 py-1"><span
                                                    class="badge bg-success text-white  px-2 py-1 fs-13">Paid</span>
                                            </td>
                                        @endif
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="position-absolute top-100 start-50 translate-middle">
                        <img src="{{ asset('public/BackEnd/images/check-2.png') }}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="clearfix pb-3 mt-6">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="fw-semibold">From: </th>
                                    <th class="fw-semibold">To:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 class="card-title">ZoneShop Store</h4>
                                        <p class="mb-2">
                                            {{ $transaction->pickupAddress->ward . ', ' . $transaction->pickupAddress->district . ', ' . $transaction->pickupAddress->province }}
                                        </p>
                                        <p class="mb-2"><span class="text-decoration-underline">Phone :</span>
                                            {{ $transaction->pickupAddress->phone }}</p>
                                        <p class="mb-2"><span class="text-decoration-underline">Email :</span>
                                            {{ $transaction->pickupAddress->email }}</p>
                                    </td>
                                    <td>
                                        <h4 class="card-title">{{ $transaction->deliveryAddress->fullname }}</h4>
                                        <p class="mb-2">
                                            {{ $transaction->deliveryAddress->address . ', ' . $transaction->deliveryAddress->ward . ', ' . $transaction->deliveryAddress->district . ', ' . $transaction->deliveryAddress->province }}
                                        </p>
                                        <p class="mb-2"><span class="text-decoration-underline">Phone :</span>
                                            {{ $transaction->deliveryAddress->phone }}</p>
                                        <p class="mb-2"><span class="text-decoration-underline">Email :</span>
                                            {{ $transaction->deliveryAddress->email }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive table-borderless text-nowrap table-centered">
                            <table class="table mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="border-0 py-2">Product Name</th>
                                        <th class="border-0 py-2">Quantity</th>
                                        <th class="border-0 py-2">Price</th>
                                        <th class="text-end border-0 py-2">Total</th>
                                    </tr>
                                </thead> <!-- end thead -->
                                <tbody>
                                    @foreach ($transaction->orders as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div
                                                        class="rounded bg-light avatar d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset($item->product->product_image) }}"
                                                            alt="" class="avatar">
                                                    </div>
                                                    <div>
                                                        <a href="#!" class="text-dark fw-medium fs-15">
                                                            {{ $item->order_product_name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->order_qty }}</td>
                                            <td>{{ number_format($item->order_price) . ' VND' }}</td>
                                            <td class="text-end">{{ number_format($item->order_amount) . ' VND' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-5 col-6">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr class="">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0"> Sub Total : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">
                                            {{ number_format($transaction->orders->sum('order_amount')) . ' VND' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0">Fee Ship : </p>
                                        </td>
                                        <td class="text-end text-dark fw-medium  py-2">
                                            +{{ number_format($transaction->transaction_amount - $transaction->orders->sum('order_amount')) . ' VND' }}
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td class="text-end p-0 pe-5 py-2">
                                            <p class="mb-0 t    ext-dark fw-semibold">Total Amount : </p>
                                        </td>
                                        <td class="text-end text-dark fw-semibold  py-2">
                                            {{ number_format($transaction->transaction_amount) . ' VND' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
