@extends('layout')
@section('content')
    <main class="main-wrapper">
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Shipping Details Information</h4>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input type="text" id="first-name" name="checkout_fullname" placeholder="Enter Full Name"
                                    value="{{ $address_user->fullname ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email" name="checkout_email" placeholder="Enter Email"
                                    value="{{ $address_user->email ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number <span>*</span></label>
                                <input type="text" id="phone-number" name="checkout_phone" placeholder="Enter Phone"
                                    value="{{ $address_user->phone ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Province <span>*</span></label>
                                <select id="province" name="checkout_province" required>
                                    <option value="{{ $address_user->province ?? '' }}" selected>
                                        {{ $address_user->province ?? 'Choose Province' }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>District <span>*</span></label>
                                <select id="district" name="checkout_district" required>
                                    <option value="{{ $address_user->district ?? '' }}">
                                        {{ $address_user->district ?? 'Choose District' }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ward <span>*</span></label>
                                <select id="ward" name="checkout_ward" required>
                                    <option value="{{ $address_user->ward ?? '' }}">
                                        {{ $address_user->ward ?? 'Choose Ward' }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Detail Address <span>*</span></label>
                                <input type="text" id="detail-address" name="checkout_detail_address"
                                    placeholder="Enter Detail Address" value="{{ $address_user->address ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="checkout-btn" class="axil-btn btn-bg-primary checkout-btn">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const host = "https://provinces.open-api.vn/api/";

        // Hàm gọi API để lấy tỉnh
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "province", "{{ $address_user->province ?? '' }}");
                })
                .catch((error) => {
                    console.error("Error fetching provinces: ", error);
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=3');

        // Hàm gọi API để lấy quận huyện
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district", "{{ $address_user->district ?? '' }}");
                })
                .catch((error) => {
                    console.error("Error fetching districts: ", error);
                });
        }

        // Hàm gọi API để lấy phường xã
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "ward", "{{ $address_user->ward ?? '' }}");
                })
                .catch((error) => {
                    console.error("Error fetching wards: ", error);
                });
        }

        // Hàm render dữ liệu vào select
        var renderData = (array, select, defaultValue) => {
            let row = '<option disabled value="">Choose</option>';
            array.forEach(element => {
                row +=
                    `<option value="${element.code}" ${element.code == defaultValue ? 'selected' : ''}>${element.name}</option>`;
            });
            document.querySelector("#" + select).innerHTML = row;
        }

        // Gọi API khi chọn tỉnh
        $("#province").change(() => {
            if ($("#province").val()) {
                callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
            }
            printResult();
        });

        // Gọi API khi chọn quận huyện
        $("#district").change(() => {
            if ($("#district").val()) {
                callApiWard(host + "d/" + $("#district").val() + "?depth=2");
            }
            printResult();
        });

        // Khi chọn phường xã
        $("#ward").change(() => {
            printResult();
        });

        // Hàm in ra kết quả lựa chọn
        var printResult = () => {
            if ($("#province").val() && $("#district").val() && $("#ward").val()) {
                let result = $("#province option:selected").text() +
                    " | " + $("#district option:selected").text() + " | " +
                    $("#ward option:selected").text();
                alert(result);
            }
        }
    </script>
@endsection
