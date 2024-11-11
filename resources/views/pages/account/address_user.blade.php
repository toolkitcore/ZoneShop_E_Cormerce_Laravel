@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Add Shipping Details Information</h4>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input type="text" id="first-name" name="checkout_fullname" placeholder="Enter Full Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email" name="checkout_email" placeholder="Enter Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number <span>*</span></label>
                                <input type="text" id="phone-number" name="checkout_phone" placeholder="Enter Phone"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Province <span>*</span></label>
                                <select id="province" name="checkout_province" required>
                                    <option value="" data-request="1">Choose Province</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>District <span>*</span></label>
                                <select id="district" name="checkout_district" required>
                                    <option value="">Choose District</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ward <span>*</span></label>
                                <select id="ward" name="checkout_ward" required>
                                    <option value="">Choose Ward</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Detail Address <span>*</span></label>
                                <input type="text" id="detail-address" name="checkout_detail_address"
                                    placeholder="Enter Detail Address" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="checkout-btn" class="axil-btn btn-bg-primary checkout-btn">
                                    Save Address
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
    <script>
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "province");
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                });
        }
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "ward");
                });
        }
        var renderData = (array, select) => {
            let row = ' <option disable value="">Choose</option>';
            array.forEach(element => {
                row += `<option value="${element.code}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row
        }

        $("#province").change(() => {
            callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
            printResult();
        });
        $("#district").change(() => {
            callApiWard(host + "d/" + $("#district").val() + "?depth=2");
            printResult();
        });
        $("#ward").change(() => {
            printResult();
        })
        var printResult = () => {
            if ($("#district").val() != "" &&
                $("#province").val() != "" &&
                $("#ward").val() != ""
            ) {
                let province = $("#province option:selected").text()
                let district = $("#district option:selected").text()
                let ward = $("#ward option:selected").text();
                $('#checkout-btn').click(function(e) {
                    e.preventDefault();

                    let userData = {
                        checkout_fullname: $('#first-name').val(),
                        checkout_email: $('#email').val(),
                        checkout_phone: $('#phone-number').val(),
                        checkout_province: province,
                        checkout_district: district,
                        checkout_ward: ward,
                        checkout_detail_address: $('#detail-address').val(),
                    };
                    $.ajax({
                        url: "{{ route('add.user') }}",
                        type: 'POST',
                        data: userData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                if (response.success) {
                                    // alert(response.success); 
                                    window.location.href = response.redirect;
                                }
                            }
                        },
                        error: function(xhr) {
                            alert("Error: " + xhr.responseJSON.error || "Failed to add user");
                        }
                    });

                });
            }

        }
    </script>
@endsection
