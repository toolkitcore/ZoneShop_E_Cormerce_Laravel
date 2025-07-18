@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <?php

        use Gloudemans\Shoppingcart\Facades\Cart;

        $content = Cart::content();
        ?>
        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                @foreach ($address_pickup as $address)
                    <input type="hidden" name="" id="pickup_address" value="{{ $address->address }}">
                    <input type="hidden" name="" id="pickup_ward" value="{{ $address->ward }}">
                    <input type="hidden" name="" id="pickup_district" value="{{ $address->district }}">
                    <input type="hidden" name="" id="pickup_province" value="{{ $address->province }}">
                @endforeach
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
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
                                    <!-- Options here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>District <span>*</span></label>
                                <select id="district" name="checkout_district" required>
                                    <option value="">Choose District</option>
                                    <!-- Options here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ward <span>*</span></label>
                                <select id="ward" name="checkout_ward" required>
                                    <option value="">Choose Ward</option>
                                    <!-- Options here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Detail Address <span>*</span></label>
                                <input type="text" id="detail-address" name="checkout_detail_address"
                                    placeholder="Enter Detail Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($content as $key => $v_content)
                                            <tr class="order-product" data-id="{{ $v_content->id }}"
                                                data-name="{{ $v_content->name }}" data-qty="{{ $v_content->qty }}"
                                                data-price="{{ $v_content->price }}"
                                                data-amount="{{ $v_content->price * $v_content->qty }}">
                                                <td>{{ $v_content->name }} <span
                                                        class="quantity">{{ 'x' . $v_content->qty }}</span></td>
                                                <td>{{ number_format($v_content->price * $v_content->qty) . ' VND' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="order-subtotal">
                                            <td>Subtotal</td>
                                            <td>{{ Cart::subtotal(0) . ' VND' }}</td>
                                        </tr>
                                        <tr class="order-shipping">
                                            <td colspan="2">
                                                <div class="shipping-amount">
                                                    <span class="title">Shipping (GHTK)</span>
                                                    <span class="amount" id="shipping-fee">0 VND</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount" id="total"
                                                data-total="{{ Cart::total(0) }}">
                                                {{ Cart::total(0) . ' VND' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment" value="pay_online">
                                        <label for="radio4">Direct bank transfer</label>
                                    </div>
                                    <img src="{{ asset('FrontEnd/images/vnpay.png') }}" alt=""
                                        width="200px">
                                </div>
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio5" name="payment" value="pay_offline" checked>
                                        <label for="radio5">Cash on delivery</label>
                                    </div>
                                    <p>Pay with cash upon delivery</p>
                                </div>
                            </div>

                            <form id="online-form">
                                @csrf
                                <input type="hidden" name="total" id="total-hidden" value="1000000">
                                <!-- Thay giá trị vào đây -->
                                <button type="submit" id="checkout-btn" class="axil-btn btn-bg-primary checkout-btn">
                                    Process to Checkout
                                </button>
                            </form>


                            <button type="submit" name="redirect" class="axil-btn btn-bg-primary checkout-btn"
                                id="offline-btn">
                                Process to Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
    <script>
        // Lắng nghe sự thay đổi của các radio button
        document.querySelectorAll('input[name="payment"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                if (document.getElementById('radio4').checked) {
                    // Nếu chọn 'Direct bank transfer' (online), hiển thị button online và ẩn button offline
                    document.getElementById('online-form').style.display = 'block';
                    document.getElementById('offline-btn').style.display = 'none';
                } else {
                    // Nếu chọn 'Cash on delivery' (offline), hiển thị button offline và ẩn button online
                    document.getElementById('online-form').style.display = 'none';
                    document.getElementById('offline-btn').style.display = 'block';
                }
            });
        });

        // Khởi tạo trạng thái ban đầu
        if (document.getElementById('radio4').checked) {
            document.getElementById('online-form').style.display = 'block';
            document.getElementById('offline-btn').style.display = 'none';
        } else {
            document.getElementById('online-form').style.display = 'none';
            document.getElementById('offline-btn').style.display = 'block';
        }
    </script>
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
        var fee_shipping_checkout = 0;
        var printResult = () => {
            if ($("#district").val() != "" &&
                $("#province").val() != "" &&
                $("#ward").val() != ""
            ) {
                let result = $("#province option:selected").text() +
                    " | " + $("#district option:selected").text() + " | " +
                    $("#ward option:selected").text();

                const weight = 5000;
                var totalAmount = document.getElementById('total').textContent.trim();
                var amountOnly = totalAmount.replace(' VND', '');
                var value = parseInt(amountOnly.replace(/,/g, ''));
                var pickupAddress = document.getElementById('pickup_address').value;
                var pickupWard = document.getElementById('pickup_ward').value;
                var pickupDistrict = document.getElementById('pickup_district').value;
                var pickupProvince = document.getElementById('pickup_province').value;

                const data = {
                    pick_province: pickupProvince,
                    pick_district: pickupDistrict,
                    pick_ward: pickupWard,
                    province: $("#province option:selected").text(),
                    district: $("#district option:selected").text(),
                    ward: $("#ward option:selected").text(),
                    weight: weight,
                    value: value,
                    deliver_option: "xteam",
                };
                console.log(data);


                axios.post('{{ route('calculate_shipping') }}', data)
                    .then(response => {
                        const fee = response.data.fee.fee;
                        if (fee !== null) {
                            fee_shipping_checkout = fee;
                            document.getElementById('shipping-fee').textContent = fee.toLocaleString('en-US') +
                                ' VND';
                            var total_value = document.getElementById('total').getAttribute('data-total').replace(
                                /,/g, '');
                            var total_value_integer = parseInt(total_value, 10); // Convert to integer
                            document.getElementById('total-hidden').value = total_value_integer + fee;
                            document.getElementById('total').textContent = (total_value_integer + fee)
                                .toLocaleString(
                                    'en-US') +
                                ' VND';
                        } else {
                            showToast('Not caculator shipping !!', {
                                gravity: 'top',
                                position: 'right',
                                duration: 5000,
                                close: true,
                                backgroundColor: '#dc3545'
                            });
                        }
                    })
                    .catch(error => {
                        showToast(error.message, {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    });
            }
        }

        $(document).ready(function() {
            $('#offline-btn').on('click', function(event) {
                event.preventDefault();

                var products = [];
                $('.order-product').each(function() {
                    var product = {
                        name: $(this).data('name'),
                        product_id: parseInt($(this).data('id')),
                        quantity: parseInt($(this).data('qty')),
                        price: parseFloat($(this).data('price')),
                        amount: parseFloat($(this).data('amount'))
                    };
                    products.push(product);
                });
                var data = {
                    checkout_fullname: $('#first-name').val(),
                    checkout_email: $('#email').val(),
                    checkout_phone: $('#phone-number').val(),
                    checkout_province: $("#province option:selected").text(),
                    checkout_district: $("#district option:selected").text(),
                    checkout_ward: $("#ward option:selected").text(),
                    checkout_detail_address: $('#detail-address').val(),
                    order_products: products,
                    transaction_amount: parseFloat($('#total').data('total').replace(/,/g, '')) +
                        parseFloat(fee_shipping_checkout),
                    payment: $('input[name="payment"]:checked').val(),
                    _token: $('input[name="_token"]').val() // CSRF token
                };
                console.log(data);


                // Validate form fields
                let isValid = true;
                for (let key in data) {
                    if (data[key] === "" || data[key] === null) {
                        isValid = false;
                        break;
                    }
                }

                if (!isValid) {
                    showToast('Please fill in all required fields', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#ffcc00'
                    });
                    return;
                }
                var phoneNumber = document.getElementById("phone-number").value;

                // Kiểm tra nếu số điện thoại có đúng 10 chữ số
                var phoneRegex = /^\d{10}$/;
                if (!phoneRegex.test(phoneNumber)) {
                    showToast('Phone number must be exactly 10 digits.', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#ffcc00'
                    });
                    return;
                }
                $.ajax({
                    url: '{{ URL::to('process-checkout') }}', // Path to your controller
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('An error occurred while processing checkout', {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                        // console.log(xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {
            $("#online-form").submit(function(e) {
                e.preventDefault(); // Ngừng form tự động submit

                var fee_shipping_checkout = 0; // Cập nhật giá trị phí vận chuyển nếu có

                // Lấy dữ liệu sản phẩm từ trang
                var products = [];
                $('.order-product').each(function() {
                    var product = {
                        name: $(this).data('name'),
                        product_id: parseInt($(this).data('id')),
                        quantity: parseInt($(this).data('qty')),
                        price: parseFloat($(this).data('price')),
                        amount: parseFloat($(this).data('amount'))
                    };
                    products.push(product);
                });

                // Tạo đối tượng dữ liệu gửi đi
                var data = {
                    checkout_fullname: $('#first-name').val(),
                    checkout_email: $('#email').val(),
                    checkout_phone: $('#phone-number').val(),
                    checkout_province: $("#province option:selected").text(),
                    checkout_district: $("#district option:selected").text(),
                    checkout_ward: $("#ward option:selected").text(),
                    checkout_detail_address: $('#detail-address').val(),
                    order_products: products,
                    transaction_amount: parseFloat($('#total').data('total').replace(/,/g, '')) +
                        parseFloat(fee_shipping_checkout),
                    payment: $('input[name="payment"]:checked').val(),
                    total: $('#total-hidden').val(),
                    _token: $('input[name="_token"]').val() // CSRF token
                };

                console.log(data);

                // Kiểm tra tính hợp lệ của các trường
                let isValid = true;
                for (let key in data) {
                    if (data[key] === "" || data[key] === null) {
                        isValid = false;
                        break;
                    }
                }
                var phoneNumber = document.getElementById("phone-number").value;

                // Kiểm tra nếu số điện thoại có đúng 10 chữ số
                var phoneRegex = /^\d{10}$/;
                if (!phoneRegex.test(phoneNumber)) {
                    showToast('Phone number must be exactly 10 digits.', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#ffcc00'
                    });
                    return;
                }

                if (!isValid) {
                    showToast('Please fill in all required fields', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: true,
                        backgroundColor: '#ffcc00'
                    });
                    return;
                }

                // Gửi AJAX request
                $.ajax({
                    url: "{{ route('pay-online') }}", // Đảm bảo đường dẫn chính xác
                    type: "POST",
                    data: data,
                    success: function(response) {
                        if (response.code == '00') {
                            window.location.href = response.data;
                        } else {
                            showToast('Error!! Please try again !!!', {
                                gravity: 'top',
                                position: 'right',
                                duration: 5000,
                                close: true,
                                backgroundColor: '#dc3545'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // console.log(error);
                        showToast('Error!! Please try again !!!', {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#dc3545'
                        });
                    }
                });
            });
        });
    </script>
@endsection
