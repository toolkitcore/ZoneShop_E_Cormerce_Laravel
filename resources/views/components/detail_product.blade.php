@foreach ($products as $value)
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <img src="{{ asset($value->product_image) }}" alt="{{ $value->product_name }}" class="img-fluid">
            <div class="card-body bg-light-subtle rounded-bottom">
                <a href="" class="text-dark fw-medium fs-16">
                    {{ $value->product_name }}
                </a>
                <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2">
                    <span class="text-muted text-decoration-line-through">
                        ${{ number_format($value->product_price_original, 2) }}
                    </span>
                    ${{ number_format($value->product_price_selling, 2) }}
                    <small class="text-muted">
                        ({{ number_format((($value->product_price_original - $value->product_price_selling) / $value->product_price_original) * 100, 0) }}%
                        Off)
                    </small>
                </h4>
                <div class="mt-3">
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <a href="#" class="btn btn-soft-primary border border-primary-subtle"
                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bx bx-dots-horizontal-rounded"></i></a>
                            <div class="dropdown-menu">
                                <!-- item-->
                                <a href="{{ URL::to('edit-product/' . $value->product_id) }}"
                                    class="dropdown-item">Edit</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Overview</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                        <a href=""
                            class="btn btn-outline-dark border border-secondary-subtle d-flex align-items-center justify-content-center gap-1 w-100">
                            Add To Cart</a>
                    </div>
                </div>
            </div>
            <span class="position-absolute top-0 end-0 p-3">
                <button type="button"
                    class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle"><iconify-icon
                        icon="solar:heart-broken"></iconify-icon></button>
            </span>
        </div>
    </div>
@endforeach

@if ($products->count() === 0)
    <h3>No products found</h3>
@endif
