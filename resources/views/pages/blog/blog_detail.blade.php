@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <div class="axil-single-post post-formate post-standard">
                <div class="container">
                    <div class="content-block">
                        <div class="inner">
                            <div class="post-thumbnail">
                                <img src="{{ asset($post->post_image) }}" alt="blog Images">
                            </div>
                            <!-- End .thumbnail -->
                        </div>
                    </div>
                    <!-- End .content-blog -->
                </div>
            </div>
            <!-- End .single-post -->
            <div class="post-single-wrapper position-relative">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col-lg-1">
                            <div class="d-flex flex-wrap align-content-start h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="post-details__social-share">
                                        <span class="share-on-text">Share on:</span>
                                        <div class="social-share">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fab fa-discord"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-8 axil-post-wrapper">
                            <div class="post-heading">
                                <h2 class="title">{{ $post->title }}</h2>
                            </div>
                            <div id="post-content">
                                {!! $post->content !!}
                            </div>
                            {{-- <div class="axil-comment-area">
                                    <h4 class="title">2 comments</h4>
                                    <ul class="comment-list">
                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/blog/author-image-4.png" alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Cameron Williamson">Cameron
                                                                        Williamson</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                            <div class="reply-edit">
                                                                <div class="reply">
                                                                    <a class="comment-reply-link hover-flip-item-wrapper"
                                                                        href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Reply">Reply</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p>Duis hendrerit velit scelerisque felis tempus, id porta libero
                                                                venenatis. Nulla facilisi. Phasellus viverra magna commodo dui
                                                                lacinia tempus. Donec malesuada nunc non dui posuere, fringilla
                                                                vestibulum
                                                                urna mollis. Integer condimentum ac sapien quis maximus. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="children">
                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="assets/images/blog/author-image-4.png"
                                                                    alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Rahabi Khan">Annie Mario</span>
                                                                        </span>
                                                                    </a>
                                                                </h6>
                                                                <div class="comment-meta">
                                                                    <div class="time-spent">Nov 23, 2018 at 12:23 pm
                                                                    </div>
                                                                    <div class="reply-edit">
                                                                        <div class="reply">
                                                                            <a class="comment-reply-link hover-flip-item-wrapper"
                                                                                href="#">
                                                                                <span class="hover-flip-item">
                                                                                    <span data-text="Reply">Reply</span>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    <p>Pellentesque habitant morbi tristique senectus et netus
                                                                        et malesuada fames ac turpis egestas. Suspendisse
                                                                        lobortis cursus lacinia. Vestibulum vitae leo id diam
                                                                        pellentesque ornare.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->
                                            </ul>
                                        </li>
                                        <!-- End Single Comment  -->

                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/blog/author-image-5.png" alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Rahabi Khan">Thopmson Arnold</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                            <div class="reply-edit">
                                                                <div class="reply">
                                                                    <a class="comment-reply-link hover-flip-item-wrapper"
                                                                        href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Reply">Reply</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p>Duis hendrerit velit scelerisque felis tempus, id porta libero
                                                                venenatis. Nulla facilisi. Phasellus viverra magna commodo dui
                                                                lacinia tempus. Donec malesuada nunc non dui posuere, fringilla
                                                                vestibulum
                                                                urna mollis. Integer condimentum ac sapien quis maximus. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single Comment  -->
                                    </ul>
                                </div> --}}
                            <!-- End .axil-commnet-area -->

                            <!-- Start Comment Respond  -->
                            {{-- <div class="comment-respond">
                                <h4 class="title">Leave a Reply</h4>
                                <form action="#">
                                    <p class="comment-notes"><span id="email-notes">Your email address will not be
                                            published.</span></p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Leave a Reply</label>
                                                <textarea name="message" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Name <span>*</span></label>
                                                <input id="name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email <span>*</span> </label>
                                                <input id="email" type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <button name="submit" type="submit" id="submit"
                                                    class="axil-btn btn-bg-primary w-auto">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <!-- End Comment Respond  -->
                        </div>

                        <div class="col-lg-4">
                            <!-- Start Sidebar Area  -->
                            <aside class="axil-sidebar-area">

                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget mt--40">
                                    <h6 class="widget-title">Latest Posts</h6>

                                    <!-- Start Single Post List  -->
                                    <div class="content-blog post-list-view mb--20">
                                        <div class="thumbnail">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/blog-04.png" alt="Blog Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="blog-details.html">Dubai’s FRAME Offers its Take
                                                    on the</a></h6>
                                            <div class="axil-post-meta">
                                                <div class="post-meta-content">
                                                    <ul class="post-meta-list">
                                                        <li>Mar 27, 2022</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post List  -->

                                    <!-- Start Single Post List  -->
                                    <div class="content-blog post-list-view mb--20">
                                        <div class="thumbnail">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/blog-05.png" alt="Blog Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="blog-details.html">Apple presents App Best of 2020
                                                    winners</a></h6>
                                            <div class="axil-post-meta">
                                                <div class="post-meta-content">
                                                    <ul class="post-meta-list">
                                                        <li>Mar 20, 2022</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post List  -->

                                    <!-- Start Single Post List  -->
                                    <div class="content-blog post-list-view">
                                        <div class="thumbnail">
                                            <a href="blog-details.html">
                                                <img src="assets/images/blog/blog-06.png" alt="Blog Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="blog-details.html">Gallaudet University innovation
                                                    in education</a></h6>
                                            <div class="axil-post-meta">
                                                <div class="post-meta-content">
                                                    <ul class="post-meta-list">
                                                        <li>Mar 15, 2022</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post List  -->

                                </div>
                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget mt--40 widget_search">
                                    <h6 class="widget-title">Search</h6>
                                    <form class="blog-search" action="#">
                                        <button class="search-button"><i class="fal fa-search"></i></button>
                                        <input type="text" placeholder="Search">
                                    </form>
                                </div>
                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget mt--40 widget_tag_cloud">
                                    <h6 class="widget-title">Tags</h6>
                                    <div class="tagcloud">
                                        <a href="#">Design</a>
                                        <a href="#">HTML</a>
                                        <a href="#">Graphic</a>
                                        <a href="#">Development</a>
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">eCommerce</a>
                                        <a href="#">CSS</a>
                                        <a href="#">JS</a>
                                    </div>
                                </div>
                                <!-- End Single Widget  -->

                            </aside>
                            <!-- End Sidebar Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Area  -->

        <!-- Start Related Blog Area  -->
        <div class="related-blog-area bg-color-white pb--60 pb_sm--40">
            <div class="container">
                <div class="section-title-wrapper mb--70 mb_sm--40 pr--110">
                    <span class="title-highlighter highlighter-primary mb--10"> <i class="fal fa-bell"></i>Hot News</span>
                    <h3 class="mb--25">Related Blog</h3>
                </div>
                <div class="related-blog-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-07.png" alt="Blog Images">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="blog-details.html">With an Irreverent Twist, AMBUSH®
                                            Highlights Converse's Outdoor Heritage</a></h5>
                                    <div class="axil-post-meta">
                                        <div class="post-author-avatar">
                                            <img src="assets/images/blog/author-image-1.png" alt="Author Images">
                                        </div>
                                        <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#">Leslie Alexander</a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>Feb 17, 2019</li>
                                                <li>300k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-08.png" alt="Blog Images">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="blog-details.html">UCLA Athletics Reaches Multi-Year
                                            Agreement with NIKE, Inc. and Jordan Brand</a></h5>
                                    <div class="axil-post-meta">
                                        <div class="post-author-avatar">
                                            <img src="assets/images/blog/author-image-2.png" alt="Author Images">
                                        </div>
                                        <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#">Julian Vinn</a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>Mar 28, 2020</li>
                                                <li>200k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-09.png" alt="Blog Images">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="blog-details.html">An oral history of the AIM away
                                            message by the people who were there</a></h5>
                                    <div class="axil-post-meta">
                                        <div class="post-author-avatar">
                                            <img src="assets/images/blog/author-image-3.png" alt="Author Images">
                                        </div>
                                        <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#">Ariana Grande</a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>Apr 20, 2021</li>
                                                <li>500k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="content-blog">
                            <div class="inner">
                                <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                    <!-- Start Single Thumb  -->
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-08.png" alt="Blog Images">
                                        </a>
                                    </div>
                                    <!-- End Single Thumb  -->
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="blog-details.html">UCLA Athletics Reaches Multi-Year
                                            Agreement with NIKE, Inc. and Jordan Brand</a></h5>
                                    <div class="axil-post-meta">
                                        <div class="post-author-avatar">
                                            <img src="assets/images/blog/author-image-2.png" alt="Author Images">
                                        </div>
                                        <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#">Julian Vinn</a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>Mar 28, 2020</li>
                                                <li>200k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End Related Blog Area  -->

        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->

    </main>
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
        var content = {!! json_encode($post->content) !!};
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
