@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.uploadpicture')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">All User List</h4>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Name user</th>
                                            <th>Permission</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Due Date</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
