@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="{{ URL::to('trang-chu') }}">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                            </ul>
                            <h1 class="title">Contact With Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <h3 class="title mb--10">We would love to hear from you.</h3>
                                <p>If you’ve got great products your making or looking to work with us then drop us a line.
                                </p>
                                <form id="contact-form" method="POST" action="" class="axil-contact-form">
                                    @csrf
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Name <span>*</span></label>
                                                <input type="text" name="contact-name" id="contact-name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-phone">Phone <span>*</span></label>
                                                <input type="text" name="contact-phone" id="contact-phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-email">E-mail <span>*</span></label>
                                                <input type="email" name="contact-email" id="contact-email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Your Message</label>
                                                <textarea name="contact-message" id="contact-message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button name="submit" type="submit" id="submit"
                                                    class="axil-btn btn-bg-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Zonshop Store</h4>
                                <span class="address mb--20">Address: 60 Lê Thiện Trị, Hòa Quý, Ngũ Hành Sơn, Đà Nẵng</span>
                                <span class="name">Name: Hoàng Đức Trình</span>
                                <span class="phone">Phone: 0848720575</span>
                                <span class="email">Email: hoangductrinh2k5@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="axil-google-map-wrap axil-section-gap pb--0">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245374.53414499026!2d107.91347287159404!3d16.06667829632106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2zxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1730136314021!5m2!1svi!2s"
                                width="1080" height="500" id="gmap_canvas">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('contact') }}', // Đặt URL endpoint của bạn ở đây
                    data: {
                        _token: $('input[name="_token"]').val(),
                        name: $('#contact-name').val(),
                        phone: $('#contact-phone').val(),
                        email: $('#contact-email').val(),
                        message: $('#contact-message').val()
                    },
                    success: function(response) {
                        showToast(response.success, {
                            gravity: 'top',
                            position: 'right',
                            duration: 3000,
                            close: false,
                            backgroundColor: '#28a745',
                            close: false
                        });
                        $('#contact-name').val('')
                        $('#contact-phone').val('')
                        $('#contact-email').val('')
                        $('#contact-message').val('')
                    },
                    error: function(xhr, status, error) {
                        alert(
                            'Failed to send message. Please try again.'
                        );
                    }
                });
            });
        });
    </script>
@endsection
