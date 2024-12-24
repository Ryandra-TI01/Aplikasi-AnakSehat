@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row mb-6">
    @if (session()->has('success'))
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif
  </div>
  <div class="row mb-6">
    @foreach ($children as $k)  
    <div class="col-md-4 mb-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$k->nama}}</h5>
              <p class="card-text">
                <p>Tanggal Lahir : {{$k->tanggal_lahir}}</p>
                <p>Umur : {{$k->umur}} bulan </p>
                <p>Gender : {{$k->jenis_kelamin}}</p>
                <p>Status Gizi: 
                    @if ($k->childHealtData->isNotEmpty())
                        {{ $k->childHealtData->first()->status_gizi }}
                    @else
                        Belum ada data
                    @endif
                </p>
              </p>
              <a href="/child/{{ $k->id }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-md-4">
        <div class="card" style="height: 92%">
            <div class="card-body d-flex align-items-center justify-content-evenly flex-column">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun Anak</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('store-child') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                  <div class="mb-6">
                                    <label class="form-label" for="basic-default-fullname">Nama Anak</label>
                                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="nama" required>
                                  </div>
                                  <div class="mb-6">
                                    <label class="form-label" for="basic-default-company">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="basic-default-company" name="tanggal_lahir" placeholder="ACME Inc." required>
                                  </div>
                                  <div class="mb-6">
                                    <label class="form-label" for="basic-default-phone">Jenis Kelamin</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="jenis_kelamin" aria-label="Default select example" required>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                      </select>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="ms-3 btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <a href="" class="text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg class="rounded-circle bg-primary text-white p-2" xmlns="http://www.w3.org/2000/svg" width="20%" hight="20%" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                </a>
                <h5 class="card-title ">
                    Tambah Anak
                </h5>
            </div>
        </div>
    </div>
</div>
    <div class="row g-6 mb-6">
        <div class="col-md-3">
          <div class="card bg-primary text-white">
            <div class="card-body">
                <a href="">
                    <h5 class="card-title text-white">
                      <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15"><path fill="currentColor" d="M5.5 7A2.5 2.5 0 0 1 3 4.5v-2a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v2a3.49 3.49 0 0 0 1.51 2.87A4.4 4.4 0 0 1 5 10.5a3.5 3.5 0 1 0 7 0v-.57a2 2 0 1 0-1 0v.57a2.5 2.5 0 0 1-5 0a4.4 4.4 0 0 1 1.5-3.13A3.49 3.49 0 0 0 9 4.5v-2A1.5 1.5 0 0 0 7.5 1H7a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v2A2.5 2.5 0 0 1 5.5 7m6 2a1 1 0 1 1 0-2a1 1 0 0 1 0 2"/></svg>
                      Chat dengan Dokter
                   </h5>
                </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-secondary text-white">
            <div class="card-body">
                <a href="">
                    <h5 class="card-title text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20"><path fill="currentColor" d="M4.67 2c-.624 0-1.175.438-1.29 1.068C3.232 3.886 3 5.342 3 6.5c0 1.231.636 2.313 1.595 2.936c.271.177.405.405.405.6v.41q0 .027-.003.054c-.027.26-.151 1.429-.268 2.631C4.614 14.316 4.5 15.581 4.5 16a2 2 0 1 0 4 0c0-.42-.114-1.684-.229-2.869a302 302 0 0 0-.268-2.63L8 10.446v-.41c0-.196.134-.424.405-.6A3.5 3.5 0 0 0 10 6.5c0-1.158-.232-2.614-.38-3.432A1.305 1.305 0 0 0 8.33 2c-.34 0-.65.127-.884.336A1.5 1.5 0 0 0 6.5 2c-.359 0-.688.126-.946.336A1.32 1.32 0 0 0 4.671 2M6 3.5a.5.5 0 0 1 1 0v3a.5.5 0 0 0 1 0V3.33A.33.33 0 0 1 8.33 3c.157 0 .28.108.306.247C8.783 4.06 9 5.439 9 6.5a2.5 2.5 0 0 1-1.14 2.098c-.439.285-.86.786-.86 1.438v.41q0 .08.008.16c.028.258.151 1.424.268 2.622c.118 1.215.224 2.415.224 2.772a1 1 0 1 1-2 0c0-.357.106-1.557.224-2.772c.117-1.198.24-2.364.268-2.622q.008-.08.008-.16v-.41c0-.652-.421-1.153-.86-1.438A2.5 2.5 0 0 1 4 6.5c0-1.06.217-2.44.364-3.253A.305.305 0 0 1 4.671 3A.33.33 0 0 1 5 3.33V6.5a.5.5 0 0 0 1 0zm5 3A4.5 4.5 0 0 1 15.5 2a.5.5 0 0 1 .5.5v6.978l.02.224a626 626 0 0 1 .228 2.696c.124 1.507.252 3.161.252 3.602a2 2 0 1 1-4 0c0-.44.128-2.095.252-3.602c.062-.761.125-1.497.172-2.042l.03-.356H12.5A1.5 1.5 0 0 1 11 8.5zm2.998 3.044l-.021.245l-.057.653c-.047.544-.11 1.278-.172 2.038c-.126 1.537-.248 3.132-.248 3.52a1 1 0 1 0 2 0c0-.388-.122-1.983-.248-3.52a565 565 0 0 0-.229-2.691l-.021-.244v-.001L15 9.5V3.035A3.5 3.5 0 0 0 12 6.5v2a.5.5 0 0 0 .5.5h1a.5.5 0 0 1 .498.544"/></svg>
                      Resep Mpasi si kecil
                   </h5>
                </a>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <a href="">
                    <h5 class="card-title text-white">
                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 9.9V8.2q.825-.35 1.688-.525T17.5 7.5q.65 0 1.275.1T20 7.85v1.6q-.6-.225-1.213-.337T17.5 9q-.95 0-1.825.238T14 9.9m0 5.5v-1.7q.825-.35 1.688-.525T17.5 13q.65 0 1.275.1t1.225.25v1.6q-.6-.225-1.213-.338T17.5 14.5q-.95 0-1.825.225T14 15.4m0-2.75v-1.7q.825-.35 1.688-.525t1.812-.175q.65 0 1.275.1T20 10.6v1.6q-.6-.225-1.213-.338T17.5 11.75q-.95 0-1.825.238T14 12.65m-1 4.4q1.1-.525 2.213-.788T17.5 16q.9 0 1.763.15T21 16.6V6.7q-.825-.35-1.713-.525T17.5 6q-1.175 0-2.325.3T13 7.2zM12 20q-1.2-.95-2.6-1.475T6.5 18q-1.05 0-2.062.275T2.5 19.05q-.525.275-1.012-.025T1 18.15V6.1q0-.275.138-.525T1.55 5.2q1.175-.575 2.413-.888T6.5 4q1.45 0 2.838.375T12 5.5q1.275-.75 2.663-1.125T17.5 4q1.3 0 2.538.313t2.412.887q.275.125.413.375T23 6.1v12.05q0 .575-.487.875t-1.013.025q-.925-.5-1.937-.775T17.5 18q-1.5 0-2.9.525T12 20"/></svg>
                        Lihat Artikel Terbaru
                    </h5>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bg-secondary text-white">
              <div class="card-body">
                  <a href="">
                      <h5 class="card-title text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"><path fill="currentColor" fill-rule="evenodd" d="M16.594 2.218a.75.75 0 0 1 1.06 0l1.19 1.19l.002.001l2.958 2.959a.75.75 0 1 1-1.06 1.06l-.66-.66l-1.707 1.706l.707.707a.75.75 0 0 1 0 1.06l-8.276 8.278a2.25 2.25 0 0 1-2.814.298l-.034.036l-1.038 1.038a.75.75 0 0 1-1.06 0l-.335-.335l-2.225 2.225a.75.75 0 1 1-1.06-1.06l2.224-2.226l-.334-.333a.75.75 0 0 1 0-1.061l1.038-1.038l.036-.034a2.25 2.25 0 0 1 .298-2.814l8.277-8.277a.75.75 0 0 1 1.06 0l.708.707l1.706-1.706l-.661-.66a.75.75 0 0 1 0-1.061M18.315 5L16.61 6.706l.708.707l1.706-1.706zm-3.302 2.23l-.701-.7l-7.747 7.746a.75.75 0 0 0 0 1.06l2.121 2.122a.75.75 0 0 0 1.061 0l7.747-7.747l-.702-.701l-.006-.006l-1.768-1.768z" clip-rule="evenodd"/></svg>
                        Booking Vaksin sekarang
                     </h5>
                  </a>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection