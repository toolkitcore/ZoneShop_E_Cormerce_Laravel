@extends('layout')
@section('content')
    @include('components.toast')
    <main class="main-wrapper">
        <input type="hidden" name="" id="post_id" value="{{ $post->id }}">
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <div class="axil-single-post post-formate post-standard">
                <div class="container">
                    <div class="content-block">
                        <div class="inner">
                            <div class="post-thumbnail">
                                <img src="{{ asset($post->post_image) }}" alt="blog Images">
                            </div>
                        </div>
                    </div>
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
                            <div class="axil-comment-area">
                                <h4 class="title" id="count_comment">{{ $post->comments->count() . ' comments' }}</h4>
                                @foreach ($post->comments as $item)
                                    <ul class="comment-list">
                                        <div class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="{{ URL::to('public/FrontEnd/images/User/user-2.png') }}"
                                                            alt="Author Images" width="50px">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span>{{ $item->user->name }}</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">{{ $item->timestamp }}</div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p>{{ $item->content }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                @endforeach
                            </div>

                            @if (Auth::user())
                                <div class="comment-respond">
                                    <h4 class="title">Leave a Reply</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea name="message" id="content_message" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <button id="send_message" class="axil-btn btn-bg-primary w-auto">Send
                                                    Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="comment-respond">
                                    <h4 class="title">Leave a Reply</h4>
                                    <form action="#">
                                        <p class="comment-notes"><span id="email-notes">Please log in to comment !</span>
                                        </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Comment </label>
                                                    <textarea name="message" placeholder="Your Comment" readonly></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <a href="{{ route('login') }}"
                                                        class="axil-btn btn-bg-primary w-auto">Log in to
                                                        comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>

                        <div class="col-lg-4">
                            <!-- Start Sidebar Area  -->
                            <aside class="axil-sidebar-area">

                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget mt--40">
                                    <h6 class="widget-title">Latest Posts</h6>
                                    @foreach ($blog_Latest as $item)
                                        <div class="content-blog post-list-view mb--20">
                                            <div class="thumbnail">
                                                <a href="{{ URL::to('blog-detail/' . $item->id) }}">
                                                    <img src="{{ asset($item->post_image) }}" alt="Blog Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a
                                                        href="{{ URL::to('blog-detail/' . $item->id) }}">{{ $item->title }}</a>
                                                </h6>
                                                <div class="axil-post-meta">
                                                    <div class="post-meta-content">
                                                        <ul class="post-meta-list">
                                                            <li>{{ $item->created_at }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

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
                                {{-- <div class="axil-single-widget mt--40 widget_tag_cloud">
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
                                </div> --}}
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
                    @foreach ($post_related as $item)
                        <div class="slick-single-layout">
                            <div class="content-blog">
                                <div class="inner">
                                    <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                        <div class="thumbnail">
                                            <a href="{{ URL::to('blog-detail/' . $item->id) }}">
                                                <img src="{{ asset($item->post_image) }}" alt="Blog Images">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a
                                                href="{{ URL::to('blog-detail/' . $item->id) }}">{{ $item->title }}</a>
                                        </h5>
                                        <p>{{ $item->post_des }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            readOnly: true,
            modules: {
                'toolbar': false
            }
        });

        var content = {!! json_encode($post->content) !!};
        if (typeof content === 'object') {
            quill.setContents(content);
        } else {
            quill.root.innerHTML = content; // Nếu là HTML, gán trực tiếp vào editor
        }
        var htmlContent = quill.root.innerHTML; // Lấy HTML từ Quill
        document.getElementById('post-content').innerHTML = htmlContent; // Hiển thị vào phần tử #post-content
    </script>

    @if (Auth::check())
        <script>
            var userName = '{{ Auth::user()->name }}';
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#send_message').on('click', function(event) {
                event.preventDefault();

                var text = $('#content_message').val();
                var postId = $('#post_id').val(); // Lấy giá trị từ input hidden


                if (text.trim() === "") {
                    showToast('Please enter a message!', {
                        gravity: 'top',
                        position: 'right',
                        duration: 3000,
                        close: false,
                        backgroundColor: '#ffcc00',
                        close: false
                    });
                    return;
                }


                $.ajax({
                    url: '{{ route('send_comment') }}',
                    type: 'POST',
                    data: {
                        content: text,
                        post_id: postId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var commentHTML = `<ul class="comment-list">
                                                <div class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="{{ URL::to('public/FrontEnd/images/User/user-2.png') }}" alt="Author Images" width="50px">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <span>${userName}</span>
                                                                </h6>
                                                                <div class="comment-meta">
                                                                    <div class="time-spent">Just now</div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    <p>${text}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        `;

                        $('.axil-comment-area').append(commentHTML);

                        var commentCount = parseInt($('#count_comment').text()) + 1;
                        $('#count_comment').text(commentCount + ' comments');
                        $('#content_message').val('');
                    },
                    error: function(xhr, status, error) {
                        alert("There was an error sending the message.");
                    }
                });
            });
        });
    </script>
@endsection
