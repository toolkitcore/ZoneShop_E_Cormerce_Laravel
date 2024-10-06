@extends('admin_layout')
@section('content_admin')
    @include('components.toast')//

    <div class="page-content">
        <!-- Start Container Fluid -->

        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <h2 class="text-center text-primary">ADD BRAND</h2>
                </div>

                <form action="{{ URL::to('/add-brand-action') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-12 col-lg-12">
                        <form action="">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="brand-title" class="form-label">Brand Title</label>
                                                <input type="text" name="brand_name" id="brand-title"
                                                    class="form-control" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control bg-light-subtle" id="description" name="brand_desc" rows="7"
                                                    placeholder="Type description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-0">
                                                <label for="description" class="form-label">Status</label>
                                                <select class="form-control" data-choices name="brand_status"
                                                    id="choices-single-default">
                                                    <option value="1"> Active</option>
                                                    <option value="0"> Unactive</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-outline-secondary w-100" value="Add Brand">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" class="btn btn-primary w-100">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
