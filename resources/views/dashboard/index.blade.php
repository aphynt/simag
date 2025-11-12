@include('dashboard.layout.head', ['title' => 'Dashboard'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Start::page-header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>

                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">
                            Dashboards
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
                <h1 class="page-title fw-medium fs-18 mb-0">Sales Dashboard</h1>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text bg-white border"> <i class="ri-calendar-line"></i> </div>
                        <input type="text" class="form-control breadcrumb-input" id="daterange"
                            placeholder="Search By Date Range">
                    </div>
                </div>
                <div class="btn-list">
                    <button class="btn btn-white btn-wave">
                        <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                    </button>
                    <button class="btn btn-primary btn-wave me-0">
                        <i class="ri-share-forward-line me-1"></i> Share
                    </button>
                </div>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Total Products</span>
                                        <h4 class="fw-medium mb-0">854</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-primary">
                                            <i class="ti ti-shopping-cart fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i
                                            class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="d-block text-muted mb-1">Total Users</span>
                                        <h4 class="fw-medium mb-0">31,876</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-primary1">
                                            <i class="ti ti-users fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Increased By <span class="text-success">0.34%<i
                                            class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Total Revenue</span>
                                        <h4 class="fw-medium mb-0">$3,241</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-primary2">
                                            <i class="ti ti-currency-dollar fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Increased By <span class="text-success">7.66%<i
                                            class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <span class="text-muted d-block mb-1">Total Sales</span>
                                        <h4 class="fw-medium mb-0">1,76,586</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded bg-primary3">
                                            <i class="ti ti-chart-bar fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-muted fs-13">Decreased By <span class="text-danger">0.74%<i
                                            class="ti ti-arrow-narrow-down fs-16"></i></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-6">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Sales Overview
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm btn-light text-muted dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="true"> Sort By</a>
                                    <ul class="dropdown-menu" role="menu" data-popper-placement="bottom-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">This
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">This
                                                Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales-overview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header pb-0 justify-content-between">
                                <div class="card-title">
                                    Order Statistics
                                </div>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">Today</a></li>
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">This Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                Week</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body py-4 px-3">
                                <div class="d-flex gap-3 mb-3">
                                    <div class="avatar avatar-md bg-primary-transparent">
                                        <i class="ti ti-trending-up fs-5"></i>
                                    </div>
                                    <div class="flex-fill d-flex align-items-start justify-content-between">
                                        <div>
                                            <span class="fs-11 mb-1 d-block fw-medium">TOTAL ORDERS</span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="mb-0 d-flex align-items-center">3,736<span
                                                        class="text-success fs-12 ms-2 op-1"><i
                                                            class="ti ti-trending-up align-middle me-1"></i>0.57%</span>
                                                </h4>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);"
                                            class="text-success fs-12 text-decoration-underline">Earnings
                                            ?</a>
                                    </div>
                                </div>
                                <div id="orders" class="my-2"></div>
                            </div>
                            <div class="card-footer border-top border-block-start-dashed">
                                <div class="d-grid">
                                    <button
                                        class="btn btn-primary-ghost btn-wave fw-medium waves-effect waves-light table-icon">Complete
                                        Statistics<i
                                            class="ti ti-arrow-narrow-right ms-2 fs-16 d-inline-block"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card main-dashboard-banner overflow-hidden">
                            <div class="card-body p-4">
                                <div class="row justify-content-between">
                                    <div class="col-xxl-7 col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                        <h4 class="mb-3 fw-medium text-fixed-white">Upgrade to get more</h4>
                                        <p class="mb-4 text-fixed-white">Maximize sales insights. Optimize
                                            performance. Achieve success with pro.</p>
                                        <a href="javascript:void(0);"
                                            class="fw-medium text-fixed-white text-decoration-underline">Upgrade
                                            To Pro<i class="ti ti-arrow-narrow-right"></i></a>
                                    </div>
                                    <div
                                        class="col-xxl-4 col-xl-7 col-lg-7 col-md-7 col-sm-7 d-sm-block d-none text-end my-auto">
                                        <img src="{{ asset('dash') }}/build/assets/images/media/media-86.png"
                                            alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Top Selling Categories
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm btn-light text-muted dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="true"> Sort By</a>
                                    <ul class="dropdown-menu" role="menu" data-popper-placement="bottom-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">This
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">This
                                                Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="progress-stacked progress-sm mb-2 gap-1">
                                        <div class="progress-bar" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                        <div class="progress-bar bg-primary1" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary2" role="progressbar" style="width: 15%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-primary3" role="progressbar" style="width: 25%"
                                            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 20%"
                                            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div>Overall Sales</div>
                                        <div class="h6 mb-0"><span class="text-success me-2 fs-11">2.74%<i
                                                    class="ti ti-arrow-narrow-up"></i></span>1,25,875</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium top-category-name one">Clothing</span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">31,245</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted fs-12">25% Gross</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge bg-success">0.45% <i
                                                            class="ti ti-trending-up"></i></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium top-category-name two">Electronics</span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">29,553</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted fs-12">16% Gross</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge bg-warning">0.27% <i
                                                            class="ti ti-trending-up"></i></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium top-category-name three">Grocery</span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">24,577</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted fs-12">22% Gross</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge bg-secondary">0.63% <i
                                                            class="ti ti-trending-up"></i></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium top-category-name four">Automobiles</span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium">19,278</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted fs-12">18% Gross</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge bg-primary1">1.14% <i
                                                            class="ti ti-trending-down"></i></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <span class="fw-medium top-category-name five">others</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <span class="fw-medium">15,934</span>
                                                </td>
                                                <td class="text-center border-bottom-0">
                                                    <span class="text-muted fs-12">15% Gross</span>
                                                </td>
                                                <td class="text-end border-bottom-0">
                                                    <span class="badge bg-primary">3.87% <i
                                                            class="ti ti-trending-up"></i></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-1 -->
    </div>
</div>
@include('dashboard.layout.footer')
