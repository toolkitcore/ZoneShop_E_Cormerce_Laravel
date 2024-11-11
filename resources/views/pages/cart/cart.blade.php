@extends('layout')
@section('content')
    @include('components.toast')
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
                            <tbody class="cart-controller">
                                @if ($content == null || $content->isEmpty())
                                    <tr class="cart-items">
                                        <td colspan="6">
                                            <p class="text-center text-primary">NOT PRODUCT</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($content as $key => $v_content)
                                        <tr class="cart-items cart-item-remove-{{ $v_content->rowId }}">
                                            <td class="product-remove">
                                                <a href="javascript:void(0);" class="remove-cart-product"
                                                    data-rowid="{{ $v_content->rowId }}">
                                                    <i class="fal fa-times"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail"><a href="single-product.html"><img
                                                        src="{{ asset($v_content->options->image) }}"
                                                        alt="Image Product"></a></td>
                                            <td class="product-title"><a
                                                    href="{{ URL::to('san-pham-' . $v_content->id) }}">{{ $v_content->name }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price"><span
                                                    class="currency-symbol"></span>{{ number_format($v_content->price) }}
                                                VND</td>
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
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td class="total-all">
                                                    {{ Cart::subtotal(0) . ' VND' }}
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount total-all">
                                                    {{ Cart::subtotal(0) . ' VND' }}
                                                </td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ URL::to('show-checkout') }}"
                                    class="axil-btn btn-bg-primary checkout-btn">Process
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
@endsection
