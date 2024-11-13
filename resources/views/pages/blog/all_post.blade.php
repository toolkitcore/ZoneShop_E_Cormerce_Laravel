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
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Blogs</li>
                            </ul>
                            <h1 class="title">Blog List</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <div class="container">
                <div class="row row--25">
                    <div class="col-lg-8 axil-post-wrapper">
                        @foreach ($blog as $blog_item)
                            <div class="content-blog mt--60">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{ URL::to('blog-detail/' . $blog_item->id) }}">
                                            <img src="{{ asset($blog_item->post_image) }}" alt="Blog Images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="{{ URL::to('blog-detail/' . $blog_item->id) }}">{{ $blog_item->title }}</a>
                                        </h4>
                                        <p>{{ $blog_item->post_des }}</p>
                                        <div class="read-more-btn">
                                            <a class="axil-btn btn-bg-primary"
                                                href="{{ 'blog-detail/' . $blog_item->id }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                                </div>
                            </div> --}}
                            <!-- End Single Widget  -->

                        </aside>
                        <!-- End Sidebar Area -->
                    </div>
                </div>
                {{-- <div class="post-pagination">
                    <nav class="navigation pagination" aria-label="Products">
                        <ul class="page-numbers">
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="page-numbers" href="#">4</a></li>
                            <li><a class="page-numbers" href="#">5</a></li>
                            <li><a class="next page-numbers" href="#"><i class="fal fa-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div> --}}
                {{ $blog->links('vendor.pagination.custom') }}

                <!-- End post-pagination -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End Blog Area  -->

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
@endsection
