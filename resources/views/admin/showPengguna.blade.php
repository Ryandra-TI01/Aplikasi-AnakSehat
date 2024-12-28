@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">
                        @switch(Route::currentRouteName())
                            @case('showPengguna') Detail Pengguna @break
                            @case('editPengguna') Edit Pengguna @break
                        @endswitch
                    </h5>
                </div>
                <div class="card-body">
                <form action="{{ route('updatePengguna', $pengguna->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                        ></span>
                        <input
                            value="{{ $pengguna->name }}"
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="User Name"
                            aria-label="User Name"
                            aria-describedby="basic-icon-default-fullname2" 
                            {{ Route::currentRouteName() === 'showPengguna' ? 'disabled' : '' }}/>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                                value="{{ $pengguna->email }}"
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="Your Email"
                                aria-label="Your Email"
                                aria-describedby="basic-icon-default-email2"
                                {{ Route::currentRouteName() === 'showPengguna' ? 'disabled' : '' }}/>
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Phone No</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                            ></span>
                            <input
                                value="{{ $pengguna->phone_number ?? '' }}"
                                type="text"
                                id="phone_number"
                                name="phone_number"
                                class="form-control phone-mask"
                                placeholder="Phone Number"
                                aria-label="Phone Number"
                                aria-describedby="basic-icon-default-phone2"
                                {{ Route::currentRouteName() === 'showPengguna' ? 'disabled' : '' }}/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{ $pengguna->id }}">
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-message">Anak</label>
                        <div class="container col-sm-10">
                            <div class="row gap-3">
                                @forelse ($pengguna->child as $anak)
                                <div class="card text-bg-light mb-3 bg-white col col-12 col-sm-6" style="max-width: 20rem;">
                                    <h3 class="card-header">{{ $anak->nama ?? '' }}</h3>
                                    <div class="card-body">
                                    <p class="card-text">Umur : {{ $anak->umur == 0 ? 'Dibawah satu': $anak->umur }} tahun</p>
                                    <p class="card-text">Gender : {{ $anak->jenis_kelamin ?? '' }}</p>
                                    <p class="card-text">Tanggal Lahir : {{ $anak->formatTL ?? '' }}</p>
                                    <p class="card-text">
                                        Status : {{ $anak->status_terakhir ?? 'Data tidak tersedia' }}
                                    </p>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <p>Belum memasukan data anak</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('indexPengguna') }}" class="btn btn-danger me-5">Kembali</a>
                            @if(Route::currentRouteName() == 'editPengguna')
                            <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                            @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection