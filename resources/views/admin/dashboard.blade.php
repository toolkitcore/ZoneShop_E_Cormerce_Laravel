@extends('admin_layout')
@section('content_admin')
    @include('components.toast')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-fluid">

            <!-- Start here.... -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="row">
                        {{-- <div class="col-12">
                            <div class="alert alert-primary text-truncate mb-3" role="alert">
                                We regret to inform you that our server is currently experiencing technical difficulties.
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <i class="bx bx-award avatar-title fs-24 text-primary"></i>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">Transaction</p>
                                            <h3 class="text-dark mt-1 mb-0">{{ $currentMonthTransactions }}</h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange_transaction <= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange_transaction }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange_transaction }}%</span>
                                            @endif
                                            <span class="text-muted ms-1 fs-12">Last Month</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <iconify-icon icon="solar:cart-5-bold-duotone"
                                                    class="avatar-title fs-32 text-primary"></iconify-icon>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">Total Orders</p>
                                            <h3 class="text-dark mt-1 mb-0">{{ $currentWeekOrders }}</h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange <= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange }}%</span>
                                            @endif

                                            <span class="text-muted ms-1 fs-12">Last Week</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <i class="bx bx-dollar-circle avatar-title text-primary fs-24"></i>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">Revenue</p>
                                            <h3 class="text-dark mt-1 mb-0">
                                                {{ number_format($currentMonthRevenue) . ' VND' }}
                                            </h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange_revenue <= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange_revenue }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange_revenue }}%</span>
                                            @endif
                                            <span class="text-muted ms-1 fs-12">Last Month</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <i class="bx bxs-user avatar-title fs-24 text-primary"></i>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">User</p>
                                            <h3 class="text-dark mt-1 mb-0">{{ $currentMonthUsers }}</h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange_Users <= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange_Users }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange_Users }}%</span>
                                            @endif
                                            <span class="text-muted ms-1 fs-12">Last Month</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <i class="bx bx-message-rounded-dots avatar-title text-primary fs-24"></i>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">Comments</p>
                                            <h3 class="text-dark mt-1 mb-0">{{ $currentMonthComments }}</h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange_comments <= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange_comments }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange_comments }}%</span>
                                            @endif
                                            <span class="text-muted ms-1 fs-12">Last Month</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-soft-primary rounded">
                                                <i class="bx bx-x avatar-title text-primary fs-24"></i>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0 text-truncate">Cancelled Order</p>
                                            <h3 class="text-dark mt-1 mb-0">{{ $currentMonthCancelledOrders }}</h3>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div> <!-- end card body -->
                                <div class="card-footer py-2 bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            @if ($percentageChange_Cancel_Order >= 0)
                                                <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i>
                                                    {{ $percentageChange_Cancel_Order }}%</span>
                                            @else
                                                <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i>
                                                    {{ $percentageChange_Cancel_Order }}%</span>
                                            @endif
                                            <span class="text-muted ms-1 fs-12">Last Month</span>
                                        </div>

                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div> <!-- end col -->

                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3  anchor" id="simple_pie">Best-selling products</h4>
                            <div dir="ltr">
                                <div id="simple-pie" class="apex-charts"></div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Order</h4>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-light">{{ date('Y') }}</button>
                                </div>
                            </div> <!-- end card-title-->

                            <div dir="ltr">
                                <div id="dash-performance-chart-order" class="apex-charts"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div>
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title anchor" id="datalables">
                                    Order status<a class="anchor-link" href="#datalables">#</a>
                                </h4>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-light">{{ date('Y') }}</button>
                                </div>
                            </div>
                            <div id="datalables-bar" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Revenue</h4>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-light">{{ date('Y') }}</button>
                                </div>
                            </div> <!-- end card-title-->

                            <div dir="ltr">
                                <div id="dash-performance-chart-revenue" class="apex-charts"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div>

            </div> <!-- end row -->

            {{-- <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Conversions</h5>
                            <div id="conversions" class="apex-charts mb-2 mt-n2"></div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <p class="text-muted mb-2">This Week</p>
                                    <h3 class="text-dark mb-3">23.5k</h3>
                                </div> <!-- end col -->
                                <div class="col-6">
                                    <p class="text-muted mb-2">Last Week</p>
                                    <h3 class="text-dark mb-3">41.05k</h3>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="text-center">
                                <button type="button" class="btn btn-light shadow-none w-100">View Details</button>
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end left chart card -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sessions by Country</h5>
                            <div id="world-map-markers" style="height: 316px">
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <p class="text-muted mb-2">This Week</p>
                                    <h3 class="text-dark mb-3">23.5k</h3>
                                </div> <!-- end col -->
                                <div class="col-6">
                                    <p class="text-muted mb-2">Last Week</p>
                                    <h3 class="text-dark mb-3">41.05k</h3>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card card-height-100">
                        <div class="card-header d-flex align-items-center justify-content-between gap-2">
                            <h4 class="card-title flex-grow-1">Top Pages</h4>

                            <a href="#" class="btn btn-sm btn-soft-primary">View All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap table-centered m-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="text-muted ps-3">Page Path</th>
                                        <th class="text-muted">Page Views</th>
                                        <th class="text-muted">Exit Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-3"><a href="#"
                                                class="text-muted">ZoneShop/ecommerce.html</a></td>
                                        <td>465 </td>
                                        <td><span class="badge badge-soft-success">4.4%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#"
                                                class="text-muted">ZoneShop/dashboard.html</a></td>
                                        <td> 426</td>
                                        <td><span class="badge badge-soft-danger">20.4%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#" class="text-muted">ZoneShop/chat.html</a>
                                        </td>
                                        <td>254 </td>
                                        <td><span class="badge badge-soft-warning">12.25%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#"
                                                class="text-muted">ZoneShop/auth-login.html</a></td>
                                        <td> 3369</td>
                                        <td><span class="badge badge-soft-success">5.2%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#" class="text-muted">ZoneShop/email.html</a>
                                        </td>
                                        <td>985 </td>
                                        <td><span class="badge badge-soft-danger">64.2%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#" class="text-muted">ZoneShop/social.html</a>
                                        </td>
                                        <td>653 </td>
                                        <td><span class="badge badge-soft-success">2.4%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3"><a href="#" class="text-muted">ZoneShop/blog.html</a>
                                        </td>
                                        <td>478 </td>
                                        <td><span class="badge badge-soft-danger">1.4%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-xl-4 d-none">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Recent Transactions</h4>
                            <div>
                                <a href="#!" class="btn btn-sm btn-primary">
                                    <i class="bx bx-plus me-1"></i>Add
                                </a>
                            </div>
                        </div> <!-- end card-header-->
                        <div class="card-body p-0">
                            <div class="px-3" data-simplebar style="max-height: 398px;">
                                <table class="table table-hover mb-0 table-centered">
                                    <tbody>
                                        <tr>
                                            <td>24 April, 2024</td>
                                            <td>$120.55</td>
                                            <td><span class="badge bg-success">Cr</span></td>
                                            <td>Commisions </td>
                                        </tr>
                                        <tr>
                                            <td>24 April, 2024</td>
                                            <td>$9.68</td>
                                            <td><span class="badge bg-success">Cr</span></td>
                                            <td>Affiliates </td>
                                        </tr>
                                        <tr>
                                            <td>20 April, 2024</td>
                                            <td>$105.22</td>
                                            <td><span class="badge bg-danger">Dr</span></td>
                                            <td>Grocery </td>
                                        </tr>
                                        <tr>
                                            <td>18 April, 2024</td>
                                            <td>$80.59</td>
                                            <td><span class="badge bg-success">Cr</span></td>
                                            <td>Refunds </td>
                                        </tr>
                                        <tr>
                                            <td>18 April, 2024</td>
                                            <td>$750.95</td>
                                            <td><span class="badge bg-danger">Dr</span></td>
                                            <td>Bill Payments </td>
                                        </tr>
                                        <tr>
                                            <td>17 April, 2024</td>
                                            <td>$455.62</td>
                                            <td><span class="badge bg-danger">Dr</span></td>
                                            <td>Electricity </td>
                                        </tr>
                                        <tr>
                                            <td>17 April, 2024</td>
                                            <td>$102.77</td>
                                            <td><span class="badge bg-success">Cr</span></td>
                                            <td>Interest </td>
                                        </tr>
                                        <tr>
                                            <td>16 April, 2024</td>
                                            <td>$79.49</td>
                                            <td><span class="badge bg-success">Cr</span></td>
                                            <td>Refunds </td>
                                        </tr>
                                        <tr>
                                            <td>05 April, 2024</td>
                                            <td>$980.00</td>
                                            <td><span class="badge bg-danger">Dr</span></td>
                                            <td>Shopping</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row --> --}}

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">
                                    Recent Orders
                                </h4>

                                <a href="{{ URL::to('admin/all-order') }}" class="btn btn-sm btn-soft-primary">
                                    Show all
                                </a>
                            </div>
                        </div>
                        <!-- end card body -->
                        <div class="table-responsive table-centered">
                            <table class="table mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="ps-3">
                                            Order ID.
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Email ID
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            Payment Type
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <!-- end thead-->
                                <tbody>
                                    @foreach ($transaction_item as $item)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="order-detail.html">#{{ $item->transaction_id }}</a>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="#!">{{ $item->deliveryAddress->fullname }}</a>
                                            </td>
                                            <td>{{ $item->deliveryAddress->email }}</td>
                                            <td>{{ $item->deliveryAddress->phone }}</td>
                                            <td>{{ $item->deliveryAddress->province }}</td>
                                            <td>
                                                @if ($item->transaction_payment == 'pay_online')
                                                    Online
                                                @else
                                                    Offline
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->transaction_status == 0 && $item->transaction_payment == 'pay_offline')
                                                    <span
                                                        class="badge border border-warning text-warning  px-2 py-1 fs-13">
                                                        Wait confirm
                                                    </span>
                                                @elseif($item->transaction_status == 0 && $item->transaction_payment == 'pay_online')
                                                    <span
                                                        class="badge border border-secondary text-secondary  px-2 py-1 fs-13">
                                                        Paying
                                                    </span>
                                                @elseif($item->transaction_status == 1 && $item->transaction_payment == 'pay_online')
                                                    <span
                                                        class="badge border border-warning text-warning  px-2 py-1 fs-13">
                                                        Wait confirm
                                                    </span>
                                                @elseif($item->transaction_status == 2)
                                                    <span
                                                        class="badge border border-success text-success  px-2 py-1 fs-13">
                                                        Confirmed
                                                    </span>
                                                @elseif($item->transaction_status == 3)
                                                    <span
                                                        class="badge border border-warning text-warning  px-2 py-1 fs-13">
                                                        Packaging
                                                    </span>
                                                @elseif($item->transaction_status == 4)
                                                    <span
                                                        class="badge border border-success text-success  px-2 py-1 fs-13">
                                                        Shipping
                                                    </span>
                                                @elseif($item->transaction_status == 5)
                                                    <span
                                                        class="badge border border-success text-success  px-2 py-1 fs-13">
                                                        Completed
                                                    </span>
                                                @elseif($item->transaction_status == 6)
                                                    <span class="badge border border-danger text-danger  px-2 py-1 fs-13">
                                                        Canceled
                                                    </span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <!-- end tbody -->
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- table responsive -->

                        <div class="card-footer border-top">
                            <div class="row g-3">
                                <div class="col-sm">
                                    <div class="text-muted">
                                        Showing
                                        <span class="fw-semibold">{{ Count($transaction_item) }}</span>
                                        of
                                        <span class="fw-semibold">{{ $transaction_count }}</span>
                                        orders
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- End Container Fluid -->

    </div>
    <!-- ApexCharts Library -->
@endsection

@section('scripts')
    <script>
        const transactionStatuses = @json($transactionStatuses);
        const total_status = transactionStatuses.map(item => item.total_transactions);
        console.log(total_status);

        var colors = [
            "#1c84ee",
            "#ff6c2f",
            "#53389f",
            "#7f56da",
            "#f9b931",
            "#28a745",
            "#ef5f5f"
        ];
        var options = {
            chart: {
                height: 450,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    barHeight: "100%",
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: "bottom",
                    },
                },
            },
            colors: colors,
            dataLabels: {
                enabled: true,
                textAnchor: "start",
                style: {
                    colors: ["#fff"],
                },
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val;
                },
                offsetX: 0,
                dropShadow: {
                    enabled: false,
                },
            },
            series: [{
                data: total_status,
            }, ],
            stroke: {
                width: 0,
                colors: ["#fff"],
            },
            xaxis: {
                categories: [
                    "Wait Confirm",
                    "Wait Payment",
                    "Confirmed",
                    "Pakaging",
                    "Shipping",
                    "Completed",
                    "Cancel"
                ],
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
            grid: {
                borderColor: "#f1f3fa",
            },

            tooltip: {
                theme: "dark",
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function() {
                            return "";
                        },
                    },
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#datalables-bar"), options);

        chart.render();




        const categories = @json($categories);
        const category_name = categories.map(data => data.category_name);
        const percentage = categories.map(item => parseFloat(item.percentage));
        console.log(categories);

        var colors = ["#1c84ee", "#7f56da", "#ff6c2f"];
        var options = {
            chart: {
                height: 320,
                type: 'pie',
            },
            series: percentage,
            labels: category_name,
            colors: colors,
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0,
                offsetY: 7
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 240
                    },
                    legend: {
                        show: false
                    },
                }
            }]

        }
        var chart = new ApexCharts(
            document.querySelector("#simple-pie"),
            options
        );
        chart.render();
        var options = {
            chart: {
                height: 292,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: "undefined",
                            offsetY: 100
                        },
                        value: {
                            offsetY: 55,
                            fontSize: '20px',
                            color: undefined,
                            formatter: function(val) {
                                return val + "%";
                            }
                        }
                    },
                    track: {
                        background: "rgba(170,184,197, 0.2)",
                        margin: 0
                    },
                }
            },
            fill: {
                gradient: {
                    enabled: true,
                    shade: 'dark',
                    shadeIntensity: 0.2,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4
            },
            colors: ["#ff6c2f", "#22c55e"],
            series: [65.2],
            labels: ['Returning Customer'],
            responsive: [{
                breakpoint: 380,
                options: {
                    chart: {
                        height: 180
                    }
                }
            }],
            grid: {
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#conversions"),
            options
        );
        chart.render();
        const revenueData = @json($revenueData);


        // Chuyển đổi dữ liệu từ Laravel thành mảng doanh thu (Revenue)
        const revenueValues = revenueData.map(data => data.total_revenue);
        const transactionCounts = revenueData.map(item => item.transaction_count);


        var options_revenue = {
            series: [{
                name: "Revenue",
                type: "bar",
                data: revenueValues,
            }, ],
            chart: {
                height: 313,
                type: "line",
                toolbar: {
                    show: false,
                },
            },
            stroke: {
                dashArray: [0, 0],
                width: [0, 2],
                curve: 'smooth'
            },
            fill: {
                opacity: [1, 1],
                type: ['solid', 'gradient'],
                gradient: {
                    type: "vertical",
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90]
                },
            },
            markers: {
                size: [0, 0],
                strokeWidth: 2,
                hover: {
                    size: 4,
                },
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                min: 0,
                axisBorder: {
                    show: false,
                }
            },
            grid: {
                show: true,
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 0,
                    right: -2,
                    bottom: 0,
                    left: 10,
                },
            },
            legend: {
                show: true,
                horizontalAlign: "center",
                offsetX: 0,
                offsetY: 5,
                markers: {
                    width: 9,
                    height: 9,
                    radius: 6,
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0,
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "30%",
                    barHeight: "70%",
                    borderRadius: 3,
                },
            },
            colors: ["#ff6c2f", "#22c55e"],
            tooltip: {
                shared: true,
                y: [{
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toLocaleString("vi-VN") + " VND";
                            }
                            return y;
                        },
                    },
                    {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " Item";
                            }
                            return y;
                        },
                    },
                ],
            },
        }
        var chart = new ApexCharts(
            document.querySelector("#dash-performance-chart-revenue"),
            options_revenue
        );
        chart.render();

        var options_order = {
            series: [{
                name: "Order",
                type: "area",
                data: transactionCounts,
            }],
            chart: {
                height: 313,
                type: "line",
                toolbar: {
                    show: false,
                },
            },
            stroke: {
                dashArray: [0],
                width: [2], // Đường biểu đồ dày hơn
                curve: 'smooth'
            },
            fill: {
                opacity: [0], // Không tô màu bên trong
                type: ['solid'], // Loại bỏ gradient
            },
            markers: {
                size: [0],
                strokeWidth: 2,
                hover: {
                    size: 4,
                },
            },
            xaxis: {
                categories: [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
                ],
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                min: 0,
                axisBorder: {
                    show: false,
                }
            },
            grid: {
                show: true,
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 0,
                    right: -2,
                    bottom: 0,
                    left: 10,
                },
            },
            legend: {
                show: true,
                horizontalAlign: "center",
                offsetX: 0,
                offsetY: 5,
                markers: {
                    width: 9,
                    height: 9,
                    radius: 6,
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0,
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "30%",
                    barHeight: "70%",
                    borderRadius: 3,
                },
            },
            colors: ["#22c55e"], // Màu đường biểu đồ
            tooltip: {
                shared: true,
                y: [{
                    formatter: function(y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " Item";
                        }
                        return y;
                    },
                }],
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#dash-performance-chart-order"),
            options_order
        );
        chart.render();
        class VectorMap {


            initWorldMapMarker() {
                const map = new jsVectorMap({
                    map: 'world',
                    selector: '#world-map-markers',
                    zoomOnScroll: true,
                    zoomButtons: false,
                    markersSelectable: true,
                    markers: [{
                            name: "Canada",
                            coords: [56.1304, -106.3468]
                        },
                        {
                            name: "Brazil",
                            coords: [-14.2350, -51.9253]
                        },
                        {
                            name: "Russia",
                            coords: [61, 105]
                        },
                        {
                            name: "China",
                            coords: [35.8617, 104.1954]
                        },
                        {
                            name: "United States",
                            coords: [37.0902, -95.7129]
                        }
                    ],
                    markerStyle: {
                        initial: {
                            fill: "#7f56da"
                        },
                        selected: {
                            fill: "#22c55e"
                        }
                    },
                    labels: {
                        markers: {
                            render: marker => marker.name
                        }
                    },
                    regionStyle: {
                        initial: {
                            fill: 'rgba(169,183,197, 0.3)',
                            fillOpacity: 1,
                        },
                    },
                });
            }

            init() {
                this.initWorldMapMarker();
            }

        }

        document.addEventListener('DOMContentLoaded', function(e) {
            new VectorMap().init();
        });
    </script>
@endsection
