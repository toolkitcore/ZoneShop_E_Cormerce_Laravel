@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')

    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Product Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row" id="attributes-container">
                                @foreach ($products as $product_item)
                                    <div class="col-4 mt-2 attribute-item">
                                        <div class="form-control">
                                            <b class="text-primary form-control">{{ $product_item->product_name }}</b>
                                            <div class="row mt-1">
                                                <span class="col-5">
                                                    Category:{{ ' ' . $product_item->category->category_name }}</span>
                                                <span class="col-7">Brand:
                                                    {{ ' ' . $product_item->brand->brand_name }}</span>
                                            </div>
                                            @php
                                                $hasAttributeValue = false;
                                            @endphp

                                            @foreach ($product_item->productAttributes as $attribute)
                                                @if (!empty($attribute->attribute_value))
                                                    @php
                                                        $hasAttributeValue = true;
                                                    @endphp
                                                    <a href="" class="btn mt-2">
                                                        <iconify-icon icon="mdi:done-outline" width="1.2em" height="1.2em"
                                                            style="color: #21c434"></iconify-icon>
                                                    </a>
                                                    <a href="{{ URL::to('admin/edit-detail-product/' . $product_item->product_id) }}"
                                                        class="btn btn-primary update-attribute mt-2">Edit</a>
                                                @break
                                            @endif
                                        @endforeach

                                        @if (!$hasAttributeValue)
                                            <a href="{{ URL::to('admin/add-detail-product/' . $product_item->product_id) }}"
                                                class="btn btn-primary update-attribute mt-2">Add detail product</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
