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
                            <h4 class="card-title">Role: <span class="text-primary">{{ $role->name }}</span> </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <p for="permissions" class="form-label title">List Permission:</p>
                                        <div class="row">
                                            @foreach ($role->permissions as $item)
                                                <span
                                                    class="badge bg-light-title text-muted border py-2 px-2 ms-2 mt-2 col-2 fs-5"
                                                    style="text-transform: capitalize;">{{ $item->name }}</span>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
