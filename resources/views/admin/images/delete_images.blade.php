@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//

    <div class="page-content">
        <div class="container-xxl">

            <div class="row">

                <div class="col-xl-11 col-lg-11">
                    <form id="delete-form" action="{{ URL::to('admin/delete-product-images-choice') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Delete Product Images: <a href=""
                                        class="text-primary">{{ $product_item->product_name }}</a>
                                </h4>
                            </div>
                            <div class="card-body row">
                                @foreach ($list_images_of_product as $images)
                                    <div class="form-check col-2">
                                        <input type="checkbox" class="form-check-input" name="image_ids[]"
                                            value="{{ $images->image_id }}" id="customCheck{{ $images->image_id }}">
                                        <img src="{{ asset($images->image_name) }}" for="customCheck{{ $images->image_id }}"
                                            alt="" width="100px">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{ URL::to('admin/product-images') }}"
                                        class="btn btn-outline-secondary w-100">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" id="sweetalert-params" class="btn btn-outline-secondary w-100">
                                        Delete
                                        Images</button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="" type="reset" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
