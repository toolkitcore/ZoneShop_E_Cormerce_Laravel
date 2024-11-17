@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Detail Shipping </h5>
                                <div class="summery-table-wrap">
                                    <ul class="address-details">
                                        <span>{{ 'Name: ' . $transaction->deliveryAddress->fullname }}</span><br>
                                        <span> {{ 'Email: ' . $transaction->deliveryAddress->email }}</span><br>
                                        <span> {{ 'Phone: ' . $transaction->deliveryAddress->phone }}</span><br>
                                        <span>
                                            {{ 'Address: ' . $transaction->deliveryAddress->address . ', ' . $transaction->deliveryAddress->ward . ', ' . $transaction->deliveryAddress->district . ', ' . $transaction->deliveryAddress->province }}</span><br>
                                    </ul>
                                </div>
                                <h5 class="title mb--20">Status :
                                    <span class="text-primary">
                                        @if ($transaction->transaction_status == 0 && $transaction->transaction_payment == 'pay_offline')
                                            Wait Confirm
                                        @elseif ($transaction->transaction_status == 0 && $transaction->transaction_payment == 'pay_online')
                                            Not Pay
                                        @elseif($transaction->transaction_status == 1)
                                            Wait Confirm
                                        @elseif($transaction->transaction_status == 2)
                                            Confirmed
                                        @elseif($transaction->transaction_status == 3)
                                            Pakaging
                                        @elseif($transaction->transaction_status == 4)
                                            Shipping
                                        @elseif($transaction->transaction_status == 5)
                                            Completed
                                        @elseif($transaction->transaction_status == 6)
                                            Canceled
                                        @endif
                                    </span>
                                </h5>
                                @if ($transaction->transaction_status == 0 && $transaction->transaction_payment == 'pay_online')
                                    <a href="{{ URL::to('pay-online-retry/' . $transaction->transaction_id) }}"
                                        class="btn btn-primary btn-lg">Payment here</a>
                                @endif
                                @if ($transaction->transaction_status == 5)
                                    <a href="{{ URL::to('show-review/' . $transaction->transaction_id) }}"
                                        class="btn btn-primary btn-lg">Review Product</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Order Detail - <span
                                        class="text-primary">#{{ $transaction->transaction_id }}</span> </h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->orders as $item)
                                                <tr class="order-product">
                                                    <td><img src="{{ asset($item->product->product_image) }}" alt=""
                                                            width="70px">
                                                        {{ $item->order_product_name }}
                                                        <span class="quantity">
                                                            x{{ $item->order_qty }}
                                                        </span>
                                                    </td>
                                                    <td>{{ number_format($item->order_amount) . ' VND' }}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="order-shipping">
                                                <td colspan="2">
                                                    <div class="shipping-amount">
                                                        <span class="title">Fee Shipping </span>
                                                        <span class="amount">
                                                            {{ number_format($transaction->transaction_amount - $transaction->orders->sum('order_amount')) . ' VND' }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">
                                                    {{ number_format($transaction->transaction_amount) . ' VND' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
