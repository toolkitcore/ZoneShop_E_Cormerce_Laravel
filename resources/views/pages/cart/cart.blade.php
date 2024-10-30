@extends('layout')
@section('content')
    <main class="main-wrapper">
        <?php
        
        use Gloudemans\Shoppingcart\Facades\Cart;
        
        $content = Cart::content();
        ?>
        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="{{ URL::to('xoa-gio-hang') }}" class="cart-clear">Clear Shoping Cart</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $key => $v_content)
                                    <tr>
                                        <td class="product-remove"><a
                                                href="{{ URL::to('xoa-gio-hang/' . $v_content->rowId) }}"
                                                class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product.html"><img
                                                    src="{{ asset($v_content->options->image) }}" alt="Image Product"></a>
                                        </td>
                                        <td class="product-title"><a
                                                href="{{ URL::to('san-pham-' . $v_content->id) }}">{{ $v_content->name }}</a>
                                        </td>
                                        <td class="product-price" data-title="Price"><span
                                                class="currency-symbol"></span>{{ number_format($v_content->price) }} VND
                                        </td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" class="quantity-input cart-quantity"
                                                    value="{{ $v_content->qty }}" data-rowId="{{ $v_content->rowId }}"
                                                    readonly>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span class="currency-symbol total" id="subtotal-{{ $v_content->rowId }}">
                                                {{ number_format($v_content->subtotal) . ' VND' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-update-btn-area">
                        <div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div>
                        <div class="update-btn">
                            <a href="#" class="axil-btn btn-outline">Update Cart</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery mt--80">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td class="total-all">
                                                    {{ number_format(intval(floatval(str_replace(',', '', Cart::total()))), 0, '.', ',') . ' VND' }}
                                                </td>
                                            </tr>
                                            {{-- <tr class="order-shipping">
                                                <td>Shipping</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio1" name="shipping" checked>
                                                        <label for="radio1">Free Shippping</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio2" name="shipping">
                                                        <label for="radio2">Local: $35.00</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio3" name="shipping">
                                                        <label for="radio3">Flat rate: $12.00</label>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr class="order-tax">
                                                <td>State Tax</td>
                                                <td>$8.00</td>
                                            </tr> --}}
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount total-all">
                                                    {{ number_format(intval(floatval(str_replace(',', '', Cart::total()))), 0, '.', ',') . ' VND' }}
                                                </td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ URL::to('check-out') }}" class="axil-btn btn-bg-primary checkout-btn">Process
                                    to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>

    <script>
        $(document).ready(function() {
            $('.qtybtn').on('click', function() {

                let quantityInput = $(this).siblings('.cart-quantity');
                let rowid = quantityInput.data('rowid');
                let quantity = parseInt(quantityInput.val());

                $.ajax({
                    url: '{{ route('update_quantity') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        rowid: rowid,
                        quantity: quantity
                    },
                    success: function(response) {
                        $('.total-all').text('');
                        $('.total-all').text(parseFloat(response.total.replace(/,/g, ''))
                            .toLocaleString('en-US') + ' VND');

                        $('#subtotal-' + rowid).text('');
                        $('#subtotal-' + rowid).text(response.subtotal
                            .toLocaleString().replace(/\./g, ',') + ' VND');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Hiển thị lỗi nếu có
                    }
                });
            });

        });
    </script>
@endsection
