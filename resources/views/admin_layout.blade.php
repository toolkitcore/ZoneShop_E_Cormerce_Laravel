<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Dashboard | ZoneShop - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/BackEnd/images/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"></script>

    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset('public/BackEnd/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config js (Require in all Page) -->
    <script src="{{ asset('public/BackEnd/js/config.js') }}"></script>
</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <header class="topbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <button type="button" class="button-toggle-menu me-2">
                                <iconify-icon icon="solar:hamburger-menu-broken"
                                    class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>

                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Welcome!</h4>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-1">

                        <!-- Theme Color (Light/Dark) -->
                        <div class="topbar-item">
                            <button type="button" class="topbar-button" id="light-dark-mode">
                                <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>

                        <!-- Notification -->
                        <div class="dropdown topbar-item">
                            <button type="button" class="topbar-button position-relative"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <iconify-icon icon="solar:bell-bing-bold-duotone"
                                    class="fs-24 align-middle"></iconify-icon>
                                @if ($oder_confirm + $oder_success + $review_product_count == 0)
                                @else
                                    <span
                                        class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">{{ $oder_confirm + $oder_success + $review_product_count }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                @endif
                            </button>
                            <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 280px;">

                                    @if ($oder_confirm == 0)
                                    @else
                                        <a href="{{ URL::to('admin/order-confirm') }}"
                                            class="dropdown-item py-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm me-2">
                                                        <span
                                                            class="avatar-title bg-soft-warning text-warning fs-20 rounded-circle">
                                                            <iconify-icon
                                                                icon="iconamoon:comment-dots-duotone"></iconify-icon>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-wrap">You have received
                                                        <b>{{ $oder_confirm }}</b> orders. Please confirm the orders
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($oder_success == 0)
                                    @else
                                        <a href="{{ URL::to('admin/order-confirm') }}"
                                            class="dropdown-item py-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm me-2">
                                                        <span
                                                            class="avatar-title bg-soft-warning text-warning fs-20 rounded-circle">
                                                            <iconify-icon
                                                                icon="iconamoon:comment-dots-duotone"></iconify-icon>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 fw-semibold text-wrap">
                                                        <b>{{ $oder_success }}</b> orders have been paid. Please check
                                                        and confirm the orders.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($review_product_count == 0)
                                    @else
                                        @foreach ($review_product as $item)
                                            <a href="{{ URL::to('admin/review-product') }}"
                                                class="dropdown-item py-3 border-bottom">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-sm me-2">
                                                            <span
                                                                class="avatar-title bg-soft-info text-info fs-20 rounded-circle">
                                                                {{ substr($item->user->name, 0, 1) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 fw-semibold">{{ $item->user->name }}</p>
                                                        <p class="mb-0 fw-semibold">
                                                        <ul class="d-flex text-warning m-0 fs-18  list-unstyled">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $item->rating)
                                                                    <i class="bx bxs-star"></i>
                                                                @else
                                                                    <i class="bx bx-star"></i> <!-- Sao trống -->
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                        </p>

                                                        <p class="mb-0 text-wrap">
                                                            The user has given a low rating for the product. Please
                                                            review the order.
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Theme Setting -->
                        <div class="topbar-item d-none d-md-flex">
                            <button type="button" class="topbar-button" id="theme-settings-btn"
                                data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                aria-controls="theme-settings-offcanvas">
                                <iconify-icon icon="solar:settings-bold-duotone"
                                    class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>

                        {{-- <!-- Activity -->
                        <div class="topbar-item d-none d-md-flex">
                            <button type="button" class="topbar-button" id="theme-settings-btn"
                                data-bs-toggle="offcanvas" data-bs-target="#theme-activity-offcanvas"
                                aria-controls="theme-settings-offcanvas">
                                <iconify-icon icon="solar:clock-circle-bold-duotone"
                                    class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div> --}}

                        <!-- User -->
                        <div class="dropdown topbar-item">
                            <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle" width="32"
                                        src="{{ asset('public/uploads/profile/admin_profile.png') }}" alt="avatar-3">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Zoneshop !</h6>
                                <a class="dropdown-item" href="{{ URL::to('admin/profile-admin') }}">
                                    <i class="bx bx-user-circle text-muted fs-18 align-middle me-1"></i><span
                                        class="align-middle">Profile</span>
                                </a>
                                <div class="dropdown-divider my-1"></div>

                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="bx bx-log-out fs-18 align-middle me-1"></i>
                                        <span class="align-middle">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block ms-2">
                            <div class="position-relative">
                                <input type="search" class="form-control" placeholder="Search..."
                                    autocomplete="off" value="">
                                <iconify-icon icon="solar:magnifer-linear" class="search-widget-icon"></iconify-icon>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Activity Timeline -->
        <div>
            <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-activity-offcanvas"
                style="max-width: 450px; width: 100%;">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0 fw-semibold">Activity Stream</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0">
                    <div data-simplebar class="h-100 p-4">
                        <div class="position-relative ms-2">
                            <span class="position-absolute start-0  top-0 border border-dashed h-100"></span>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 avatar-sm translate-middle-x bg-danger d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20"><iconify-icon
                                            icon="iconamoon:folder-check-duotone"></iconify-icon></span>
                                    <div class="ms-2">
                                        <h5 class="mb-1 text-dark fw-semibold fs-15 lh-base">Report-Fix / Update </h5>
                                        <p class="d-flex align-items-center">Add 3 files to <span
                                                class=" d-flex align-items-center text-primary ms-1"><iconify-icon
                                                    icon="iconamoon:file-light"></iconify-icon> Tasks</span></p>
                                        <div class="bg-light bg-opacity-50 rounded-2 p-2">
                                            <div class="row">
                                                <div class="col-lg-6 border-end border-light">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i class="bx bxl-figma fs-20 text-red"></i>
                                                        <a href="#!" class="text-dark fw-medium">Concept.fig</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i class="bx bxl-file-doc fs-20 text-success"></i>
                                                        <a href="#!"
                                                            class="text-dark fw-medium">ZoneShop.docs</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="mt-2 text-muted">Monday , 4:24 PM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 avatar-sm translate-middle-x bg-success d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20"><iconify-icon
                                            icon="iconamoon:check-circle-1-duotone"></iconify-icon></span>
                                    <div class="ms-2">
                                        <h5 class="mb-1 text-dark fw-semibold fs-15 lh-base">Project Status
                                        </h5>
                                        <p class="d-flex align-items-center mb-0">Marked<span
                                                class=" d-flex align-items-center text-primary mx-1"><iconify-icon
                                                    icon="iconamoon:file-light"></iconify-icon> Design </span> as <span
                                                class="badge bg-success-subtle text-success px-2 py-1 ms-1">
                                                Completed</span></p>
                                        <div
                                            class="d-flex align-items-center gap-3 mt-1 bg-light bg-opacity-50 p-2 rounded-2">
                                            <a href="#!" class="fw-medium text-dark">UI/UX Figma Design</a>
                                            <div class="ms-auto">
                                                <a href="#!" class="fw-medium text-primary fs-18"
                                                    data-bs-toggle="tooltip" data-bs-title="Download"
                                                    data-bs-placement="bottom"><iconify-icon
                                                        icon="iconamoon:cloud-download-duotone"></iconify-icon></a>
                                            </div>
                                        </div>
                                        <h6 class="mt-3 text-muted">Monday , 3:00 PM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 avatar-sm translate-middle-x bg-primary d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-16">UI</span>
                                    <div class="ms-2">
                                        <h5 class="mb-1 text-dark fw-semibold fs-15">ZoneShop Application UI v2.0.0
                                            <span class="badge bg-primary-subtle text-primary px-2 py-1 ms-1">
                                                Latest</span>
                                        </h5>
                                        <p>Get access to over 20+ pages including a dashboard layout, charts, kanban
                                            board, calendar, and pre-order E-commerce & Marketing pages.</p>
                                        <div class="mt-2">
                                            <a href="#!" class="btn btn-light btn-sm">Download Zip</a>
                                        </div>
                                        <h6 class="mt-3 text-muted">Monday , 2:10 PM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 translate-middle-x bg-success bg-gradient d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20"><img
                                            src="{{ asset('public/BackEnd/images/users/avatar-7.jpg') }}"
                                            alt="avatar-5" class="avatar-sm rounded-circle"></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0 text-dark fw-semibold fs-15 lh-base">Alex Smith Attached Photos
                                        </h5>
                                        <div class="row g-2 mt-2">
                                            <div class="col-lg-4">
                                                <a href="#!">
                                                    <img src="{{ asset('public/BackEnd/images/small/img-6.jpg') }}"
                                                        alt="" class="img-fluid rounded">
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#!">
                                                    <img src="{{ asset('public/BackEnd/images/small/img-3.jpg') }}"
                                                        alt="" class="img-fluid rounded">
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#!">
                                                    <img src="{{ asset('public/BackEnd/images/small/img-4.jpg') }}"
                                                        alt="" class="img-fluid rounded">
                                                </a>
                                            </div>
                                        </div>
                                        <h6 class="mt-3 text-muted">Monday 1:00 PM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 translate-middle-x bg-success bg-gradient d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20"><img
                                            src="{{ asset('public/BackEnd/images/users/avatar-6.jpg') }}"
                                            alt="avatar-5" class="avatar-sm rounded-circle"></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0 text-dark fw-semibold fs-15 lh-base">Rebecca J. added a new
                                            team member
                                        </h5>
                                        <p class="d-flex align-items-center gap-1"><iconify-icon
                                                icon="iconamoon:check-circle-1-duotone"
                                                class="text-success"></iconify-icon> Added a new member to Front
                                            Dashboard</p>
                                        <h6 class="mt-3 text-muted">Monday 10:00 AM</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative ps-4">
                                <div class="mb-4">
                                    <span
                                        class="position-absolute start-0 avatar-sm translate-middle-x bg-warning d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20"><iconify-icon
                                            icon="iconamoon:certificate-badge-duotone"></iconify-icon></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0 text-dark fw-semibold fs-15 lh-base">Achievements
                                        </h5>
                                        <p class="d-flex align-items-center gap-1 mt-1">Earned a <iconify-icon
                                                icon="iconamoon:certificate-badge-duotone"
                                                class="text-danger fs-20"></iconify-icon>" Best Product Award"</p>
                                        <h6 class="mt-3 text-muted">Monday 9:30 AM</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#!" class="btn btn-outline-dark w-100">View All</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar (Theme Settings) -->
        <div>
            <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0">Theme Settings</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0">
                    <div data-simplebar class="h-100">
                        <div class="p-3 settings-bar">

                            <div>
                                <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">Light</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">Light</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                                </div>
                            </div>


                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        Light
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        Dark
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        Default
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        Condensed
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-hidden" value="hidden">
                                    <label class="form-check-label" for="leftbar-hidden">
                                        Hidden
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover-active" value="sm-hover-active">
                                    <label class="form-check-label" for="leftbar-size-small-hover-active">
                                        Small Hover Active
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label" for="leftbar-size-small-hover">
                                        Small Hover
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== App Menu Start ========== -->
        <div class="main-nav">
            <!-- Sidebar Logo -->
            <div class="logo-box">
                <a href="{{ URL::to('/trang-chu') }}" class="logo-dark">
                    <img src="{{ asset('public/BackEnd/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                    <img src="{{ asset('public/BackEnd/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                </a>

                <a href="{{ URL::to('/trang-chu') }}" class="logo-light">
                    <img src="{{ asset('public/BackEnd/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                    <img src="{{ asset('public/BackEnd/images/logo-light.png') }}" class="logo-lg" alt="logo light">
                </a>
            </div>

            <!-- Menu Toggle Button (sm-hover) -->
            <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone"
                    class="button-sm-hover-icon"></iconify-icon>
            </button>

            <div class="scrollbar" data-simplebar>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title">General</li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/dashboard') }}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarProducts">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Products </span>
                        </a>
                        <div class="collapse" id="sidebarProducts">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemDemoSubItem1"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemDemoSubItem1">
                                        <span> Attributes </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemDemoSubItem1">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/all-attribute-product') }}">List
                                                    Attribute</a>
                                            </li>
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/add-attribute-product') }}">Add
                                                    Attribute</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemDemoSubItem2"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemDemoSubItem2">
                                        <span> Product Detail </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemDemoSubItem2">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/all-detail-product') }}">List Product
                                                    Detail</a>
                                            </li>
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/add-detail-product-page') }}">Add Product
                                                    Detail</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemDemoSubItem3"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemDemoSubItem3">
                                        <span> Products </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemDemoSubItem3">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/all-product') }}">List
                                                    Product</a>
                                            </li>
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link" href="{{ URL::to('admin/add-product') }}">Add
                                                    Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemDemoSubItem4"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemDemoSubItem4">
                                        <span> Images </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemDemoSubItem4">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/product-images') }}">List
                                                    Product Images</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarOrders">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Orders </span>
                        </a>
                        <div class="collapse" id="sidebarOrders">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemOrderSubItem2"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemOrderSubItem2">
                                        <span> Orders </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemOrderSubItem2">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/order-confirm') }}">Order
                                                    Confirm</a>
                                            </li>
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link" href="{{ URL::to('admin/all-order') }}">List
                                                    Order</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link menu-arrow" href="#sidebarItemOrderSubItem3"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemOrderSubItem3">
                                        <span> Address </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemOrderSubItem3">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link"
                                                    href="{{ URL::to('admin/address-pickup') }}">Address Pickup</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarCategory">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Category </span>
                        </a>
                        <div class="collapse" id="sidebarCategory">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/all-category-product') }}">List
                                        Category</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-category-product') }}">Add
                                        Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarBrand" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarBrand">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:book-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Brand </span>
                        </a>
                        <div class="collapse" id="sidebarBrand">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/all-brand-product') }}">List
                                        Brand</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-brand-product') }}">Add
                                        Brand</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarPurchases" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarPurchases">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:card-send-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Blogs </span>
                        </a>
                        <div class="collapse" id="sidebarPurchases">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/list-post') }}">List Post</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-post') }}">Create Post</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarReview" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarReview">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:dialog-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Reviews </span>
                        </a>
                        <div class="collapse" id="sidebarReview">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/review-product') }}">List
                                        Review</a>
                                </li>
                                {{-- <li class="sub-nav-item">
                                    <a class="sub-nav-lin   k" href="{{   URL::to('admin/add-post') }}">Create Post</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>


                    <li class="menu-title mt-2">Users</li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('admin/profile-admin') }}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Profile </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarRoles" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarRoles">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:user-speak-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Roles </span>
                        </a>
                        <div class="collapse" id="sidebarRoles">
                            <ul class="nav sub-navbar-nav">
                                <ul class="nav sub-navbar-nav">
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="role-list.html">List</a>
                                    </li>
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="role-edit.html">Edit</a>
                                    </li>
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="role-add.html">Create</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pages-permissions.html">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Permissions </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarCustomers">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Customers </span>
                        </a>
                        <div class="collapse" id="sidebarCustomers">
                            <ul class="nav sub-navbar-nav">

                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/show-customer') }}">List</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="menu-title">Pages</li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarCoupons" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarCoupons">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:figma-file-bold-duotone"></iconify-icon> </span>
                            <span class="nav-text"> Sliders </span>
                        </a>
                        <div class="collapse" id="sidebarCoupons">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/all-sliders') }}">List</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-sliders') }}">Add</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarPoster" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarPoster">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:card-2-broken"></iconify-icon> </span>
                            <span class="nav-text">Posters </span>
                        </a>
                        <div class="collapse" id="sidebarPoster">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/all-poster') }}">List</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-poster') }}">Add</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarFeedBack" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarFeedBack">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:chat-square-call-bold-duotone"></iconify-icon> </span>
                            <span class="nav-text">FeedBacks </span>
                        </a>
                        <div class="collapse" id="sidebarFeedBack">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/all-feedback') }}">List</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ URL::to('admin/add-feedback') }}">Add</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        @yield('content_admin')

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    <!-- END Wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="{{ asset('public/BackEnd/js/vendor.js') }}"></script>
    <!-- App Javascript (Require in all Page) -->
    <script src="{{ asset('public/BackEnd/js/app.js') }}"></script>


    <!-- Vector Map Js -->
    <script src="{{ asset('public/BackEnd/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('public/BackEnd/vendor/jsvectormap/maps/world.js') }}"></script>

    <script src="{{ asset('public/BackEnd/js/pages/product-grid.js') }}"></script>
    <script src="{{ asset('public/BackEnd/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('public/BackEnd/js/components/extended-sweetalert.js') }}"></script>
    <script src="{{ asset('public/BackEnd/js/components/form-quilljs.js ') }}"></script>



    @yield('scripts')

</body>

</html>
