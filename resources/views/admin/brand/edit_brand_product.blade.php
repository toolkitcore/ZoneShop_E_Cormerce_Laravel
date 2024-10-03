@extends('admin_layout')
@section('content_admin')
<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <h2 class="text-center text-primary">UPDATE BRAND</h2>
            </div>

            @foreach($edit_brand_product as $brand_item)
            <form action="{{URL::to('/update-brand-action/'.$brand_item->brand_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="brand-title" class="form-label">Brand Title</label>
                                        <input type="text" value="{{$brand_item->brand_name}}" name="brand_name" id="brand-title" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control bg-light-subtle" id="description" name="brand_desc" rows="7" placeholder="Type description">{{$brand_item->brand_desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" name="add_brand" class="btn btn-outline-secondary w-100">Update Brand</button>
                            </div>
                            <div class="col-lg-2">
                                <a href="#!" class="btn btn-primary w-100">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>

    </div>
</div>
@endsection