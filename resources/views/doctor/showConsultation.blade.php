@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">
                    Detail Konsultasi
                </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Pengguna</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                        ></span>
                        <input
                            type="text"
                            class="form-control"
                            id="basic-icon-default-fullname"
                            placeholder="John Doe"
                            aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2"
                            value="{{ $konsultasi->user->name ?? '' }}"
                            disabled
                            />
                        </div>
                    </div>
                    </div>
                        <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="status" name="status" aria-label="Default select example" disabled>
                                    <option value="pendding" {{ $konsultasi->status == 'pending' ? 'selected' : '' }}>Belum Terjawab</option>
                                    <option value="responded" {{ $konsultasi->status == 'responded' ? 'selected' : '' }}>Terjawab</option>
                                  </select>
                            </div>
                        </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Tanggal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/></svg>                            
                            </span>
                                <input class="form-control" type="text" 
                                value="{{ optional($konsultasi->created_at)->format("d F Y") }}" 
                                id="html5-date-input" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Deskripsi Konsultasi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $konsultasi->pesan }}</textarea>                            
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Nama Anak</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" id="exampleFormControlTextarea1" rows="3" disabled value="{{ $konsultasi->child->nama }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone"></label>
                        <div class="col-sm-10">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:auto" class="text-center">Bulan</th>
                                            <th style="width:auto" class="text-center">Berat</th>
                                            <th style="width:auto" class="text-center">Tinggi</th>
                                            <th style="width:auto" class="text-center">Status Gizi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($anak->childHealthData->isNotEmpty())
                                        <tr>
                                            <td class="text-center">{{ $anak->status_terakhir->bulan }}</td>
                                            <td class="text-center">{{ $anak->status_terakhir->berat }} kg</td>
                                            <td class="text-center">{{ $anak->status_terakhir->tinggi }} cm</td>
                                            <td class="text-center">{{ $anak->status_terakhir->status_gizi }}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td colspan="4" class="text-center">Data Kesehatan Anak Tidak Tersedia</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                </div>
                <div class="card-body">
                    <form action="{{ $konsultasi->status == 'responded' ? route('updateResponse', $jawaban->id ?? $konsultasi->id) : route('sendResponse', $konsultasi->id) }}" method="POST">
                        @csrf
                        @if ($konsultasi->status == 'responded')
                            @method("PUT")
                        @endif
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="respon">Jawaban Konsultasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea 
                                        class="form-control" 
                                        id="respon" 
                                        name="respon" 
                                        rows="3" 
                                        required>{{ old('respon', $jawaban->respon ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if ($konsultasi->status == 'responded')
                        <input type="hidden" name="id" id="id" value="{{ $jawaban->id }}">
                        @endif
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <a href="{{ route('indexKonsul') }}" class="btn btn-danger me-5">Kembali</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ $konsultasi->status == 'responded' ? 'Edit' : 'Kirim' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection