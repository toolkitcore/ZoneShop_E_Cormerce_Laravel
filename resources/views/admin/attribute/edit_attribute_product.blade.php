@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    @include('components.confirm_delete')

    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ URL::to('/update-attribute-action') }}" method="post" id="attributes-form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Attributes -
                                    <span class="text-primary">{{ $category_item->category_name }}</span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row" id="attributes-container">
                                    @foreach ($attributes as $attribute_item)
                                        <div class="col-4 mt-2 attribute-item">
                                            <div class="form-control">
                                                <input type="text" class="form-control"
                                                    value="{{ $attribute_item->attribute_name }}"
                                                    name="attribute[{{ $attribute_item->attribute_id }}][name]">
                                                <button type="button"
                                                    class="btn btn-danger remove-attribute mt-2">Delete</button>
                                                <button type="button" class="btn btn-primary update-attribute mt-2"
                                                    data-attribute-id="{{ $attribute_item->attribute_id }}"
                                                    onclick="updateAttribute({{ $attribute_item->attribute_id }})">Update</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <div class="row d-flex align-items-center add-attribute">
                                    <div class="col-8">
                                        <input type="text" class="form-control" value="" name=""
                                            placeholder="Name Attribute" id="add_attribute_name">
                                    </div>
                                    <div class="col-4">
                                        <button type="button" onclick="addAttribute()" id="add-attribute"
                                            class="btn btn-primary w-100">Add
                                            attribute</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('attributes-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-attribute')) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to delete this attribute?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                    cancelButtonClass: 'btn btn-danger w-xs mt-2',
                    buttonsStyling: false,
                    showCloseButton: false
                }).then(function(result) {
                    if (result.value) {
                        const attributeId = event.target.parentElement.querySelector('input').name.match(
                            /\d+/)[0];
                        deleteAttribute(attributeId);
                        // Xóa phần tử HTML của attribute
                        event.target.parentElement.remove();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Cancelled',
                            text: 'The attribute is safe :)',
                            icon: 'error',
                            confirmButtonClass: 'btn btn-primary mt-2',
                            buttonsStyling: false
                        });
                    }
                });
            }
        });


        function updateAttribute(attributeId) {
            const attributeName = document.querySelector(`input[name="attribute[${attributeId}][name]"]`).value;
            const category_id = {{ $category_item->category_id }};

            // Gửi dữ liệu đến máy chủ bằng AJAX
            fetch('{{ URL::to('/update-attribute-action') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        attribute_id: attributeId,
                        attribute_name: attributeName,
                        category_id: category_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#28a745'
                        });
                    } else {
                        showToast(data.error, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function addAttribute() {
            const attributeName = document.getElementById(`add_attribute_name`).value;
            const category_id = {{ $category_item->category_id }};

            fetch('{{ URL::to('/add-attribute-action-detail') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        attribute_name: attributeName,
                        category_id: category_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#28a745'
                        });;
                        window.location.reload();
                    } else {
                        showToast(data.error, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            attributeName.textContent = '';
        }


        function deleteAttribute(attributeId) {
            fetch('{{ URL::to('/delete-attribute-action') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        attribute_id: attributeId,
                        category_id: {{ $category_item->category_id }} // Include category_id if needed for validation
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#28a745'
                        });
                    } else {

                        showToast(data.error, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while deleting the attribute.', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#dc3545'
                    });
                });
        }



        function showToast(text, options) {
            Toastify({
                text: text,
                gravity: options.gravity,
                position: options.position,
                duration: options.duration,
                close: true,
                backgroundColor: options.backgroundColor,
            }).showToast();
        }
    </script>
@endsection
