@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.uploadpicture')
    <div class="page-content">

        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Roles</h4>
                        </div>
                        <form action="{{ URL::to('admin/add-roles-action') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name Role</label>
                                            <input type="text" id="name" name="namerole" class="form-control"
                                                placeholder="Enter Name Role" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <p for="permissions" class="form-label">Choose Permissions</p>
                                            <div class="row">
                                                @foreach ($list_permissions as $item)
                                                    <div class="form-check col-2">
                                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                                            value="{{ $item->name }}" id="permission-{{ $item->id }}">
                                                        <label class="form-check-label"
                                                            for="permission-{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" class="btn btn-primary">Add Roles</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
