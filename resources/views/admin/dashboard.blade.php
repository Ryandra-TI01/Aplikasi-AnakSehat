@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        {{-- header nama --}}
        <div class="col-xl-12 mb-6 order-0">
            <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">Halo Ryandra Athaya Saleh </h5>
                    <p class="mb-6">
                    Selamat datang di dashboard admin.
                    </p>
                </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-6">
                    <img
                    src="{{asset('admin/assets/img/illustrations/man-with-laptop.png')}}"
                    height="175"
                    class="scaleX-n1-rtl"
                    alt="View Badge User" />
                </div>
                </div>
            </div>
            </div>
        </div>
        {{-- / header nama --}}
            
        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transactions</h5>
                <div class="dropdown">
                    <button
                    class="btn text-muted p-0"
                    type="button"
                    id="transactionID"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
                </div>
                <div class="card-body pt-4">
                <ul class="p-0 m-0">
                    <li class="d-flex align-items-center mb-6">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Paypal</small>
                        <h6 class="fw-normal mb-0">Send money</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">+82.6</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Wallet</small>
                        <h6 class="fw-normal mb-0">Mac'D</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">+270.69</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Transfer</small>
                        <h6 class="fw-normal mb-0">Refund</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">+637.91</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/cc-primary.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Credit Card</small>
                        <h6 class="fw-normal mb-0">Ordered Food</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">-838.71</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex align-items-center mb-6">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Wallet</small>
                        <h6 class="fw-normal mb-0">Starbucks</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">+203.33</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded" />
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <small class="d-block">Mastercard</small>
                        <h6 class="fw-normal mb-0">Ordered Food</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-2">
                        <h6 class="fw-normal mb-0">-92.45</h6>
                        <span class="text-muted">USD</span>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Expense Overview -->
        <div class="col-md-6 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header nav-align-top">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-tabs-line-card-income"
                        aria-controls="navs-tabs-line-card-income"
                        aria-selected="true">
                        Income
                    </button>
                    </li>
                    <li class="nav-item">
                    <button type="button" class="nav-link" role="tab">Expenses</button>
                    </li>
                    <li class="nav-item">
                    <button type="button" class="nav-link" role="tab">Profit</button>
                    </li>
                </ul>
                </div>
                <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div class="d-flex mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('admin/assets/img/icons/unicons/wallet.png')}}" alt="User" />
                        </div>
                        <div>
                        <p class="mb-0">Total Balance</p>
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-1">$459.10</h6>
                            <small class="text-success fw-medium">
                            <i class="bx bx-chevron-up bx-lg"></i>
                            42.9%
                            </small>
                        </div>
                        </div>
                    </div>
                    <div id="incomeChart"></div>
                    <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
                        <div class="flex-shrink-0">
                        <div id="expensesOfWeek"></div>
                        </div>
                        <div>
                        <h6 class="mb-0">Income this week</h6>
                        <small>$39k less than last week</small>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <div class="col-lg-4 col-md-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0" style="background-color: #FFAB00">
                            <svg style="color: #ffff" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M9 13.75c-2.34 0-7 1.17-7 3.5V19h14v-1.75c0-2.33-4.66-3.5-7-3.5M4.34 17c.84-.58 2.87-1.25 4.66-1.25s3.82.67 4.66 1.25zM9 12c1.93 0 3.5-1.57 3.5-3.5S10.93 5 9 5S5.5 6.57 5.5 8.5S7.07 12 9 12m0-5c.83 0 1.5.67 1.5 1.5S9.83 10 9 10s-1.5-.67-1.5-1.5S8.17 7 9 7m7.04 6.81c1.16.84 1.96 1.96 1.96 3.44V19h4v-1.75c0-2.02-3.5-3.17-5.96-3.44M15 12c1.93 0 3.5-1.57 3.5-3.5S16.93 5 15 5c-.54 0-1.04.13-1.5.35c.63.89 1 1.98 1 3.15s-.37 2.26-1 3.15c.46.22.96.35 1.5.35"/></svg>
                        </div>
                        </div>
                        <p class="mb-1">Pengguna</p>
                        <h4 class="card-title mb-3">1000</h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +10.42%</small>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0" style="background-color: #FF3E1D">
                            <svg style="color: #ffff" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5 8.5h4m-2-2v4m5.5-7h-11a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1m-2.5 0v-2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v2"/></svg>                        </div>
                        </div>
                        <p class="mb-1">Dokter</p>
                        <h4 class="card-title mb-3">100</h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +12.12%</small>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0" style="background-color: #03C3EC">
                            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M4 8.923h16V5.385q0-.231-.192-.423t-.423-.193H4.615q-.23 0-.423.192T4 5.384zm0 5.154h16V9.923H4zm.615 5.154h14.77q.23 0 .423-.193t.192-.423v-3.538H4v3.539q0 .23.192.423t.423.192M5.77 7.654V6.039h1.615v1.615zm0 5.154v-1.616h1.615v1.616zm0 5.154v-1.616h1.615v1.616z"/></svg>                        
                        </div>
                        </div>
                        <p class="mb-1">Dokter</p>
                        <h4 class="card-title mb-3">100</h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +12.12%</small>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0" style="background-color: #696CFF">
                                <svg style="color:white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M13.885 9.592v-.93q.806-.408 1.726-.612t1.889-.204q.554 0 1.064.071q.509.072 1.052.202v.908q-.524-.167-1.02-.232q-.498-.064-1.096-.064q-.97 0-1.892.218q-.924.218-1.724.643m0 5.462v-.97q.768-.407 1.717-.611t1.899-.204q.554 0 1.064.072q.509.07 1.052.201v.908q-.524-.167-1.02-.232q-.498-.064-1.096-.064q-.97 0-1.892.235q-.924.234-1.724.665m0-2.712v-.969q.806-.408 1.726-.611t1.89-.204q.554 0 1.063.07q.51.072 1.052.203v.908q-.523-.168-1.02-.232q-.497-.065-1.095-.065q-.97 0-1.892.238q-.924.237-1.724.662M12.5 17.32q1.216-.678 2.453-.98t2.547-.3q.9 0 1.618.111t1.267.296q.23.096.423-.029t.192-.394V7.008q0-.173-.096-.308q-.096-.134-.327-.23q-.825-.293-1.501-.4T17.5 5.961q-1.31 0-2.613.386q-1.304.387-2.387 1.16zm-.5 1.45q-1.22-.834-2.62-1.282T6.5 17.04q-.78 0-1.534.13q-.753.131-1.466.42q-.544.217-1.022-.131T2 16.496V6.831q0-.371.195-.689t.547-.442q.887-.383 1.836-.56T6.5 4.962q1.47 0 2.866.423q1.398.423 2.634 1.23q1.237-.807 2.634-1.23t2.866-.423q.973 0 1.922.178q.95.177 1.836.56q.352.125.547.442t.195.689v9.665q0 .614-.516.943q-.517.328-1.1.111q-.693-.27-1.418-.39q-.724-.121-1.466-.121q-1.48 0-2.88.448T12 18.769"/></svg>                        
                            </div>
                        </div>
                        <p class="mb-1">Artikel</p>
                        <h4 class="card-title mb-3">245</h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +23.12%</small>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection