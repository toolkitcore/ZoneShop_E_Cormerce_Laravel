@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item">
                                    <a href="{{ URL::to('trang-chu') }}">Home</a>
                                </li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Review Product</li>
                            </ul>
                            <h1 class="title">Review your products </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start About Area  -->
        <div class="axil-about-area about-style-1 axil-section-gap ">
            <div class="container">
                <h3 class="mt-2">Order ID : <span class="text-primary"> #{{ $list_product->transaction_id }}</span></h3>
                <input type="hidden" name="transaction_id" id="transaction_id" value="{{ $list_product->transaction_id }}">
                @foreach ($list_product->orders as $item)
                    @php
                        $productReviewed = false;
                    @endphp
                    @foreach ($list_review as $item_review)
                        @if ($item_review->product_id == $item->product_id)
                            @php
                                $productReviewed = true;
                            @endphp
                        @break
                    @endif
                @endforeach

                @if ($productReviewed)
                    <div class="axil-order-summery order-checkout-summery">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Review product {{ $item->product_id }}</h4>
                            <h6> {{ 'Product: ' . $item->order_product_name . ' x ' . $item->order_qty }}
                            </h6>
                            <h3 class="text-primary"> The product has been evaluated</h3>
                        </div>
                    </div>
                @else
                    <form class="review-form" data-order-id="{{ $item->product_id }}">
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <div class="axil-order-summery order-checkout-summery">
                                    <div class="axil-checkout-billing">
                                        <h4 class="title mb--40">Review product {{ $item->product_id }}</h4>
                                        <h6> {{ 'Product: ' . $item->order_product_name . ' x ' . $item->order_qty }}
                                        </h6>
                                        <div class="form-group">
                                            <label>Review <span>*</span></label>
                                            <textarea name="content_review" class="content_review" id="content_review_{{ $item->product_id }}" cols="30"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div id="rateYo_{{ $item->product_id }}"></div>
                                    <button type="button" class="axil-btn btn-bg-primary mt-2 submit-rating-btn"
                                        data-product-id="{{ $item->product_id }}">
                                        Send review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            @endforeach

        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function() {
        @foreach ($list_product->orders as $item)
            $("#rateYo_{{ $item->product_id }}").rateYo({
                rating: 5,
                fullStar: true,
                starWidth: "30px",
            });
        @endforeach

        $(".submit-rating-btn").click(function() {
            var productId = $(this).data("product-id");
            var contentReview = $("#content_review_" + productId).val();
            var rating = $("#rateYo_" + productId).rateYo("option", "rating");
            var transactionId = $('#transaction_id').val();

            if (contentReview == '') {
                showToast('Please enter the review content', {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: true,
                    backgroundColor: '#dc3545'
                });
            } else {
                $.ajax({
                    url: '{{ route('product.review.store') }}', // Route của bạn để xử lý review
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token để bảo mật
                        product_id: productId,
                        content_review: contentReview,
                        rating: rating,
                        transactionId: transactionId,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            showToast('Review submitted successfully !', {
                                gravity: 'top',
                                position: 'right',
                                duration: 5000,
                                close: true,
                                backgroundColor: '#28a745'
                            });
                            $(".review-form[data-order-id='" + productId + "']").remove();

                        } else {
                            showToast('There was an error while submitting your review', {
                                gravity: 'top',
                                position: 'right',
                                duration: 5000,
                                close: true,
                                backgroundColor: '#dc3545'
                            });
                        }
                    },
                    error: function() {
                        showToast('There was an error while submitting your review', {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    }
                });
            }

        });
    });
</script>
@endsection
