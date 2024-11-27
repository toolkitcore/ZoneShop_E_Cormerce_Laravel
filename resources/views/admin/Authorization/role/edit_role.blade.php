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
                            <h4 class="card-title">Update Roles - <span class="text-primary">{{ $role_name }}</span></h4>
                        </div>
                        <form action="{{ URL::to('admin/update-roles-action/' . $role->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <p for="permissions" class="form-label">Choose Permissions</p>
                                            <div class="row">
                                                @foreach ($list_permissions as $item)
                                                    <div class="form-check col-2">
                                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                                            value="{{ $item->name }}" id="permission-{{ $item->id }}"
                                                            {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}>
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
                                <button type="submit" class="btn btn-primary">Save Roles</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
