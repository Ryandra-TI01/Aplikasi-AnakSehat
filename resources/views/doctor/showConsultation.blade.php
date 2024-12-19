@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @foreach($konsultasi as $k)
    <div>
        <h3>{{ $k->user->nama }} ({{ $k->child->nama }})</h3>
        <p>Keluhan: {{ $k->pesan }}</p>
        <form method="POST" action="{{ route('dokter.kirimRespon', $k->id) }}">
            @csrf
            <textarea name="respon" rows="3" required></textarea>
            <button type="submit">Kirim Respon</button>
        </form>
    </div>
@endforeach
{{-- tahap percobaan --}}
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Konsultasi</h5>
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
                            value="Ryandra Firdaus"
                            disabled
                            />
                        </div>
                    </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Topik Konsultasi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="36" height="36" x="6" y="6" rx="3"/><path stroke-linecap="round" d="M16 19v-3h16v3M22 34h4m-2-16v16"/></g></svg>
                            </span>
                            <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                aria-describedby="basic-icon-default-email2" 
                                value="Perkembangan Anak"
                                disabled
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="1" disabled selected>Belum Terjawab</option>
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
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Deskripsi Konsultasi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, accusantium ut! Veritatis, praesentium iusto! Labore non, perferendis sapiente harum ea nostrum excepturi ab, asperiores id rem dignissimos natus corporis doloremque?    
                                </textarea>                            
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Nama Anak</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" id="exampleFormControlTextarea1" rows="3" disabled value="Antonio"/>
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
                                    <tr>
                                        <td class="text-center">3 </td>
                                        <td class="text-center">3kg</td>
                                        <td class="text-center">80 cm</td>
                                        <td class="text-center">Stunting</td>
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
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Jawaban Konsultasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"> </textarea>                            
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10 mb-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection