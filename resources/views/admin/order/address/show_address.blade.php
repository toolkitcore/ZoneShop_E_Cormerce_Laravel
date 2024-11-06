@extends('admin_layout')
@section('content_admin')
    @include('components.toast')

    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                @if ($address)
                    <div class="col-lg-12">
                        @foreach ($address as $address_item)
                            <form action="{{ route('delete_address') }}" method="post">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Information Address Pickup</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="address_detail">
                                            <span>Address
                                                Pickup:{{ ' ' . $address_item->address . ', ' . $address_item->ward . ', ' . $address_item->district . ', ' . $address_item->province }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer border-top">
                                        <button type="submit" class="btn btn-primary">Delete
                                            address</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                @else
                    <div class="col-lg-12">
                        <form id="addressForm">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Information Address Pickup</h4>
                                </div>
                                <div class="card-body row">
                                    <div class="form-group mt-2 col-6">
                                        <label for="receiverProvince">Province:</label>
                                        <select id="receiverProvince" class="form-control"></select>
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <label for="receiverDistrict">District:</label>
                                        <select id="receiverDistrict" class="form-control">
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <label for="receiverWard">Ward:</label>
                                        <select id="receiverWard" class="form-control">
                                            <option value="">Select Ward</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" class="form-control"
                                            placeholder="Enter specific address" required>
                                    </div>
                                    <div class="form-group mt-2 col-12">
                                        <span id="address_yourchoice"></span>
                                    </div>
                                </div>
                                <div class="card-footer border-top">
                                    <button type="button" id="getaddress" class="btn btn-primary">Add Address
                                        Pickup</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const host = "https://provinces.open-api.vn/api/";

        // Function to load provinces
        const loadProvinces = () => {
            return axios.get(host + '?depth=1')
                .then(response => {
                    renderData(response.data, "receiverProvince");
                });
        }

        // Function to load districts
        const loadDistricts = (api, selectId) => {
            return axios.get(api)
                .then(response => {
                    renderData(response.data.districts, selectId);
                });
        }

        // Function to load wards
        const loadWards = (api, selectId) => {
            return axios.get(api)
                .then(response => {
                    renderData(response.data.wards, selectId);
                });
        }

        // Function to render options in select
        const renderData = (array, selectId) => {
            let options = '<option disabled selected value="">Select</option>';
            array.forEach(element => {
                options += `<option value="${element.code}">${element.name}</option>`;
            });
            document.querySelector("#" + selectId).innerHTML = options;
        }

        // Event handlers for loading districts and wards based on selected province
        $("#receiverProvince").change(() => {
            loadDistricts(host + "p/" + $("#receiverProvince").val() + "?depth=2", "receiverDistrict");
            $("#receiverWard").html('<option disabled selected value="">Select Ward</option>'); // Reset wards
            printResult();
        });

        $("#receiverDistrict").change(() => {
            loadWards(host + "d/" + $("#receiverDistrict").val() + "?depth=2", "receiverWard");
            printResult();
        });

        $("#receiverWard").change(() => {
            printResult();
        });

        // Function to print result based on selected values
        const printResult = () => {
            const receiverResult =
                `Receiver Address: ${$("#address").val()},
                                    ${$("#receiverProvince option:selected").text()} |
                                    ${$("#receiverDistrict option:selected").text()} |
                                    ${$("#receiverWard option:selected").text()}`;
            $("#address_yourchoice").text(receiverResult);
        }

        $(document).on('click', '#getaddress', function() {
            // Lấy dữ liệu từ form
            const addressData = {
                province: $("#receiverProvince option:selected").text(), // Lấy tên tỉnh
                district: $("#receiverDistrict option:selected").text(), // Lấy tên quận
                ward: $("#receiverWard option:selected").text(), // Lấy tên phường
                address: $("#address").val()
            };
            if (addressData.province && addressData.district && addressData.ward && addressData.address) {
                $.ajax({
                    url: '{{ route('add_address_pickup') }}', // Địa chỉ API hoặc route bạn muốn gửi dữ liệu đến
                    type: 'POST',
                    data: addressData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Gửi CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response
                                .redirect_url;
                        } else {}
                    },
                    error: function(xhr, status, error) {
                        alert('Có lỗi xảy ra khi gửi dữ liệu. Vui lòng thử lại.');
                    }
                });
            } else {
                alert('Vui lòng điền đầy đủ thông tin.');
            }
        });

        loadProvinces();
    </script>
@endsection
