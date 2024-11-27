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
                            <h4 class="card-title">Roles of Account : <span class="text-primary">{{ $account->name }}</span>
                            </h4>
                        </div>
                        <form action="{{ URL::to('admin/role-account-action/' . $account->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Choice Role for Account </p>
                                        <div class="d-flex gap-2 align-items-center">
                                            @foreach ($list_roles as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="{{ $item->id }}"
                                                        {{ $role_account && $role_account->id == $item->id ? 'checked' : '' }}
                                                        value="{{ $item->name }}">
                                                    <label class="form-check-label" for="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" class="btn btn-primary">Save Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
