@extends('layouts.doctor')

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
                    Selamat datang di dashboard dokter.
                    </p>
                </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-6">
                    <img
                    src="{{asset('doctor/img/doctor.png')}}"
                    height="175"
                    class="scaleX-n1-rtl"
                    alt="View Badge User" />
                </div>
                </div>
            </div>
            </div>
        </div>
        {{-- / header nama --}}
        
        <!-- Expense Overview -->
        <div class="col-lg-6 mb-6">
            <div class="card h-100">
                <div class="card-header nav-align-top">
                </div>
                <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div class="d-flex mb-6">
                        <div class="avatar flex-shrink-0 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M6 14h8v-2H6zm0-3h12V9H6zm0-3h12V6H6zM2 22V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18H6zm3.15-6H20V4H4v13.125zM4 16V4z"/></svg>                        </div>
                        <div>
                        <p class="mb-0">Konsultasi</p>
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-1">20</h6>
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
                        <h6 class="mb-0">Konsultasi Minggu ini</h6>
                        <small>1% lebih rendah dari minggu lalu</small>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <div class="col-lg-6 col-md-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0 alig" style="background-color: #03C3EC">
                            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M6.5 13.5h7v-1h-7zm0-3h11v-1h-11zm0-3h11v-1h-11zM3 20.077V4.616q0-.691.463-1.153T4.615 3h14.77q.69 0 1.152.463T21 4.616v10.769q0 .69-.463 1.153T19.385 17H6.077zM5.65 16h13.735q.23 0 .423-.192t.192-.423V4.615q0-.23-.192-.423T19.385 4H4.615q-.23 0-.423.192T4 4.615v13.03zM4 16V4z"/></svg>                        </div>
                        </div>
                        <p class="mb-1">Konsultasi</p>
                        <h4 class="card-title mb-3">100</h4>
                        <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +12.12%</small>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-6 mb-6">
                    <div class="card h-110">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0 justify-content-center" style="background-color: #696CFF">
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