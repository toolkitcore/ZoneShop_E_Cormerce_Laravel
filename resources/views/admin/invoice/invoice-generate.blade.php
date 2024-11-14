<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">ZoneShop Store</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $transaction->transaction_id }}</span> <br>
                    <span>Date: {{ date('d/ m /Y') }}</span> <br>
                    <span>Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $transaction->transaction_id }}</td>

                <td>Full Name:</td>
                <td>{{ $transaction->deliveryAddress->fullname }}</td>
            </tr>
            <tr>
                <td>Payment Method</td>
                @if ($transaction->transaction_payment == 'pay_offline')
                    <td>Cash on Delivery</td>
                @else
                    <td>Online Payment</td>
                @endif
                <td>Email:</td>
                <td>{{ $transaction->deliveryAddress->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $transaction->created_at }}</td>

                <td>Phone:</td>
                <td>{{ $transaction->deliveryAddress->phone }}</td>
            </tr>
            <tr>
                <td>Status Pay:</td>
                @if ($transaction->transaction_payment == 'pay_offline')
                    <td>Not pay</td>
                @else
                    <td>Paid</td>
                @endif

                <td>Address:</td>
                <td>{{ $transaction->deliveryAddress->address . ', ' . $transaction->deliveryAddress->ward . ', ' . $transaction->deliveryAddress->district . ', ' . $transaction->deliveryAddress->province }}
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction->orders as $item)
                <tr>
                    <td width="10%">16</td>
                    <td>
                        {{ $item->order_product_name }}
                    </td>
                    <td width="10%">{{ number_format($item->order_price) . ' VND' }}</td>
                    <td width="10%">{{ $item->order_qty }}</td>
                    <td width="15%" class="fw-bold">{{ number_format($item->order_amount) . ' VND' }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4">Fee Ship:</td>
                <td colspan="1">
                    +{{ number_format($transaction->transaction_amount - $transaction->orders->sum('order_amount')) . ' VND' }}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Total Amount :</td>
                <td colspan="1" class="total-heading">{{ number_format($transaction->transaction_amount) . ' VND' }}
                </td>
            </tr>
            @if ($transaction->transaction_payment == 'pay_online')
                <tr>
                    <td colspan="5" class="total-heading" style="color: green; text-align: center;">PAID</td>
                </tr>
            @else
                <tr>
                    <td colspan="5" class="total-heading" style="color: rgb(228, 163, 24); text-align: center;">
                        UNPAID</td>
                </tr>
            @endif

        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with ZoneShop Store
    </p>

</body>

</html>
