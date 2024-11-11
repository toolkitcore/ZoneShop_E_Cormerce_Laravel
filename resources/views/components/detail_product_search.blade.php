@foreach ($products as $value)
    <div class="axil-product-list">
        <div class="thumbnail">
            <a href="{{ URL::to('san-pham-' . $value->product_id) }}">
                <img src="{{ asset($value->product_image) }}" width="100px" alt="Yantiti Leather Bags">
            </a>
        </div>
        <div class="product-content">
            {{-- <div class="product-rating">
                <span class="rating-icon">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fal fa-star"></i>
                </span>
                <span class="rating-number"><span>100+</span> Reviews</span>
            </div> --}}
            <h6 class="product-title"><a
                    href="{{ URL::to('san-pham-' . $value->product_id) }}">{{ $value->product_name }}</a></h6>
            <div class="product-price-variant">
                <span class="price current-price">{{ $value->product_price_selling }}</span>
                <span class="price old-price">{{ $value->product_price_original }}</span>
            </div>
            <div class="product-cart">
                <a href="{{ URL::to('gio-hang') }}" class="cart-btn add-cart-item"
                    data-product-id="{{ $value->product_id }}">
                    <i class="fal fa-shopping-cart"></i>
                </a>
                <a href="{{ URL::to('show-wishlist') }}" class="cart-btn"><i class="fal fa-heart"></i></a>
            </div>
        </div>
    </div>
@endforeach

@if ($products->count() === 0)
    <h3>No products found</h3>
@endif
