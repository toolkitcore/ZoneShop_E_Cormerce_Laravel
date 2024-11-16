@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <!-- Start Wishlist Area  -->
        <div class="axil-wishlist-area axil-section-gap">
            <div class="container">
                <div class="product-table-heading">
                    <h4 class="title">My Wish List on Zoneshop</h4>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-wishlist-table">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Unit Price</th>
                                <th scope="col" class="product-stock-status">Stock Status</th>
                                <th scope="col" class="product-add-cart"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($wishlistItems == null || $wishlistItems->isEmpty())
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center text-primary">NOT PRODUCT WISHLIST</p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($wishlistItems as $value)
                                    <tr class="wishlist-item-{{ $value->id }}" data-product-id="{{ $value->id }}">
                                        <td class="product-remove">
                                            <a href="#" class="remove-wishlist" data-rowid="{{ $value->rowId }}">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.html">
                                                <img src="{{ asset($value->options->image) }}"
                                                    alt="{{ $value->options->image }}">
                                            </a>
                                            <p>{{ $value->image }}</p>
                                        </td>
                                        <td class="product-title"><a href="single-product.html">{{ $value->name }}</a></td>
                                        <td class="product-price" data-title="Price"><span
                                                class="currency-symbol"></span>{{ number_format($value->price) . ' VND' }}
                                        </td>
                                        <td class="product-stock-status" data-title="Status">In Stock</td>
                                        <td class="product-add-cart">
                                            <a href="cart.html" class="axil-btn btn-outline add-cart-item"
                                                data-product-id="{{ $value->id }}">Add to
                                                Cart</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Wishlist Area  -->
    </main>
    <script>
        $('.remove-wishlist').on('click', function() {
            // var button = $(this);
            var rowid = $(this).data('rowid');
            var product_id = $(this).closest('tr').data('product-id');
            $.ajax({
                type: 'DELETE',
                url: '{{ route('removeFromWishlist') }}',
                data: {
                    rowid: rowid,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('.wishlist-item-' + product_id).remove();
                    showToast(response.success, {
                        gravity: 'top',
                        position: 'right',
                        duration: 3000,
                        close: false,
                        backgroundColor: '#28a745',
                        close: false
                    });
                },
                error: function(xhr, status, error) {
                    showToast('Error adding product to wishlist:', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#dc3545'
                    });
                    console.log(xhr.responseText); // Log the entire response for more details
                }
            });
        });

        function showToast(text, options) {
            Toastify({
                text: text,
                gravity: options.gravity,
                position: options.position,
                duration: options.duration,
                close: false,
                backgroundColor: options.backgroundColor,
            }).showToast();
        }
    </script>
@endsection
