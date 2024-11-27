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
                            <h4 class="card-title">All Permission</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card border-primary border">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary mb-2">Permission "Publish"</h5>
                                                    @foreach ($permissions as $item)
                                                        @if (str_contains($item->name, 'publish'))
                                                            <span
                                                                class="badge bg-success-subtle text-danger border py-2 px-2 fs-6 mt-1">
                                                                <!-- Use str_contains instead of 'contain' -->
                                                                {{ $item->name }}
                                                            </span>
                                                        @endif
                                                    @endforeach

                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-primary border">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary mb-2">Permission "Create"</h5>
                                                    @foreach ($permissions as $item)
                                                        @if (str_contains($item->name, 'add'))
                                                            <span
                                                                class="badge bg-success-subtle text-danger border py-2 px-2 fs-6 mt-1">
                                                                <!-- Use str_contains instead of 'contain' -->
                                                                {{ $item->name }}
                                                            </span>
                                                        @endif
                                                    @endforeach

                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-primary border">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary mb-2">Permission "Edit"</h5>
                                                    @foreach ($permissions as $item)
                                                        @if (str_contains($item->name, 'edit'))
                                                            <span
                                                                class="badge bg-success-subtle text-danger border py-2 px-2 fs-6 mt-1">
                                                                <!-- Use str_contains instead of 'contain' -->
                                                                {{ $item->name }}
                                                            </span>
                                                        @endif
                                                    @endforeach

                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-primary border">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary mb-2">Permission "Delete"</h5>
                                                    @foreach ($permissions as $item)
                                                        @if (str_contains($item->name, 'delete'))
                                                            <span
                                                                class="badge bg-success-subtle text-danger border py-2 px-2 fs-6 mt-1">
                                                                <!-- Use str_contains instead of 'contain' -->
                                                                {{ $item->name }}
                                                            </span>
                                                        @endif
                                                    @endforeach

                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
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
