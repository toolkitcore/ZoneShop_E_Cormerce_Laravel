@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    {{-- <div class="page-content"> --}}

    <div class="page-content">

        <div class="container-xxl">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <img src="{{ asset($post_item->post_image) }}" alt="">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-1">
                                <a href="#!" class="fs-24 text-dark fw-medium">{{ $post_item->title }}</a>
                            </p>
                            <p><i>{{ $post_item->post_des }}</i></p>
                            <h5 class="text-dark fw-medium">
                                <div id="post-content">
                                    {!! $post_item->content !!}
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        var quill = new Quill('#snow-editor1', {
            theme: 'snow',
            readOnly: true, // Đặt chế độ chỉ đọc
            modules: {
                'toolbar': false // Tắt toolbar
            }
        });

        // Lấy dữ liệu từ backend
        var content = {!! json_encode($post_item->content) !!};
        if (typeof content === 'object') {
            quill.setContents(content); // Nếu là Delta (Quill format), set trực tiếp
        } else {
            quill.root.innerHTML = content; // Nếu là HTML, gán trực tiếp vào editor
        }

        // Sau khi Quill editor được khởi tạo, hiển thị nội dung HTML vào phần tử khác
        var htmlContent = quill.root.innerHTML; // Lấy HTML từ Quill
        document.getElementById('post-content').innerHTML = htmlContent; // Hiển thị vào phần tử #post-content
    </script>
@endsection
