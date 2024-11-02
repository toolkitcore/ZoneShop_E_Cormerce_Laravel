@foreach ($products as $product)
    <div class="col-xl-4 col-sm-6">
        <div class="axil-product product-style-one mb--30">
            <div class="thumbnail">
                <a href="{{ URL::to('san-pham-' . $product->product_id) }}">
                    <img src="{{ asset($product->product_image) }}" alt="Product Images">
                </a>
                <div class="label-block label-right">
                    <div class="product-badget">
                        {{ round((($product->product_price_original - $product->product_price_selling) / $product->product_price_original) * 100) }}%
                        OFF</div>
                </div>
                <div class="product-hover-action">
                    <ul class="cart-action">
                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                        <li class="select-option">
                            <a href="#" class="add-cart-item" data-product-id="{{ $product->product_id }}">Add to
                                Cart</a>
                        </li>
                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
                <div class="inner">
                    <h5 class="title"><a
                            href="{{ URL::to('san-pham-' . $product->product_id) }}">{{ $product->product_name }}</a>
                    </h5>
                    <div class="product-price-variant">
                        <span
                            class="price current-price">{{ number_format($product->product_price_selling) . ' VND' }}</span>
                        <span
                            class="price old-price">{{ number_format($product->product_price_original) . ' VND' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
