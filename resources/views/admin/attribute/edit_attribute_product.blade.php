@extends('admin_layout')
@section('content_admin')
    @include('components.toast')


    <div class="page-content">

        <div class="container-xxl">

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ URL::to('/update-attribute-action') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Attribute</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="variant-name" class="form-label">
                                                Name Attribute </label>
                                            <input type="text" id="variant-name" class="form-control"
                                                placeholder="Enter List Attributes" name="attribute_name">
                                            <p class="ms-3 mt-1">
                                                For a single attribute: name_attribute <br>
                                                For a list of attributes: [name_attribute_1, name_attribute_2,
                                                name_attribute_3, ...]
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <input type="submit" class="btn btn-primary" value="Update Attributes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
