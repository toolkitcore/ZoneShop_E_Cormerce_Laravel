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
                            <h4 class="card-title">Add Account</h4>
                        </div>
                        <form action="{{ URL::to('admin/add-account-action') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" id="name" name="fullname" class="form-control"
                                                placeholder="Enter  FullName" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label"> Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
