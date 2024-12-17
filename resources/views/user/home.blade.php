@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-6">
        {{-- header nama --}}
        <div class="col-xl-12 order-0">
            <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h3 class="card-title text-primary mb-3">Halo Ryandra Athaya Saleh </h3>
                    <p class="mb-6">
                    Selamat datang di Halaman Pengguna.
                    </p>
                </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <img
                    src="{{asset('user/img/kids1.jpg')}}"
                    height="175"
                    class="scaleX-n1-rtl"
                    alt="View Badge User" />

                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Antonion La Santo</h5>
                  <p class="card-text">
                    <span>Tanggal Lahir : 17 Agustus 2022</span>
                    <br>
                    <span>Umur : 2 tahun</span>
                    <br>
                    <span>Gender : Laki-laki</span>
                    <br>
                    <span>Status : Gizi Normal</span>
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Antonion La Santo</h5>
                  <p class="card-text">
                    <span>Tanggal Lahir : 17 Agustus 2022</span>
                    <br>
                    <span>Umur : 2 tahun</span>
                    <br>
                    <span>Gender : Laki-laki</span>
                    <br>
                    <span>Status : Gizi Normal</span>
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height: 100%">
                <div class="card-body d-flex align-items-center justify-content-evenly flex-column">
                    <a href="" class="text-center">
                        <svg class="rounded-circle bg-primary text-white p-2" xmlns="http://www.w3.org/2000/svg" width="20%" hight="20%" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                    </a>
                    <h5 class="card-title">
                        Tambah Anak
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center" style="margin-bottom: 3rem">Cara Melakukan Konsultasi</h3>
                  <div class="row g-4 justify-content-center">
                    <!-- Icon 1 -->
                    <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 5rem; height: 5rem;">
                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="-2 -2 24 24">
                                <path fill="currentColor" d="M7 12.917v.583a4.5 4.5 0 1 0 9 0v-1.67a3.001 3.001 0 1 1 2 0v1.67a6.5 6.5 0 1 1-13 0v-.583A6 6 0 0 1 0 7V2a2 2 0 0 1 2-2h1a1 1 0 1 1 0 2H2v5a4 4 0 1 0 8 0V2H9a1 1 0 1 1 0-2h1a2 2 0 0 1 2 2v5a6 6 0 0 1-5 5.917M17 10a1 1 0 1 0 0-2a1 1 0 0 0 0 2" />
                            </svg>
                        </div>
                        <p class="mt-3 text-center">Klik menu chat dokter</p>
                    </div>           
                    <!-- Arrow -->
                    <div class="col-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5rem" height="5rem" viewBox="0 0 16 9">
                            <path fill="currentColor" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                            <path fill="currentColor" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                        </svg>
                    </div>
            
                    <!-- Icon 2 -->
                    <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 5rem; height: 5rem;">
                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 22v-3c0-2.828 0-4.243-.879-5.121C18.243 13 16.828 13 14 13l-2 2l-2-2c-2.828 0-4.243 0-5.121.879C4 14.757 4 16.172 4 19v3M15.5 6.5v-1a3.5 3.5 0 1 0-7 0v1a3.5 3.5 0 1 0 7 0M16 16v3m1.5-1.5h-3" color="currentColor" />
                            </svg>
                        </div>
                        <p class="mt-3 text-center">Pilih dokter</p>
                    </div>
                    <!-- Arrow -->
                    <div class="col-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5rem" height="5rem" viewBox="0 0 16 9">
                            <path fill="currentColor" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                            <path fill="currentColor" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                        </svg>
                    </div>          

                    <!-- Icon 3 -->
                    <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 5rem; height: 5rem;">
                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg"  width="50%" height="50%" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h8m-8 4h6m-5 5H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-3l-3 3z"/></svg>
                        </div>
                        <p class="mt-3 text-center">Chat dokter</p>
                    </div>
                    <!-- Arrow -->
                    <div class="col-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5rem" height="5rem" viewBox="0 0 16 9">
                            <path fill="currentColor" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                            <path fill="currentColor" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                        </svg>
                    </div>                        
                    <!-- Icon 4 -->
                    <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 5rem; height: 5rem;">
                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg"  width="55%" height="55%" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4"><circle cx="24" cy="28" r="16"/><path stroke-linecap="round" stroke-linejoin="round" d="M28 4h-8m4 0v8m11 4l3-3M24 28v-6m0 6h-6"/></g></svg>
                        </div>
                        <p class="mt-3 text-center">Menunggu respon dokter</p>
                    </div>                 
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-6">
        <h2>Artikel Kesehatan Anak</h2>
        <p>
            <a href="">Lihat Semua</a>
        </p>
    </div>
    <div class="row mb-12 g-6">
        <div class="col-md">
            <div class="card">
              <div class="d-flex">
                <div class="d-flex justify-content-center align-items-center ">
                  <img class="card-img card-img-left" style="object-fit: cover" src="https://images.unsplash.com/photo-1581578021450-fbd19fba0e63?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aGVhbHRoJTIwY2hpbGR8ZW58MHx8MHx8fDA%3D" alt="Card image">
                </div>
                <div>
                  <div class="card-body">
                    <h5 class="card-title">5 Tips Menjaga Kesehatan Anak</h5>
                    <p class="card-text">
                      Menjaga kesehatan anak adalah hal utama yang penting dilakukan oleh setiap orang tua demi tumbuh kembang anak yang optimal. Jika anak sehat, tumbuh kembangnya optimal...
                    </p>
                    <p class="card-text"><small class="text-muted">Published 10 Mei 2023</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md">
          <div class="card">
            <div class="d-flex">
              <div class="d-flex justify-content-center align-items-center overflow-hidden">
                <img class="card-img card-img-left" style="object-fit: cover" src="https://images.unsplash.com/photo-1581578021450-fbd19fba0e63?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aGVhbHRoJTIwY2hpbGR8ZW58MHx8MHx8fDA%3D" alt="Card image">
              </div>
              <div>
                <div class="card-body">
                  <h5 class="card-title">5 Tips Menjaga Kesehatan Anak</h5>
                  <p class="card-text">
                    Menjaga kesehatan anak adalah hal utama yang penting dilakukan oleh setiap orang tua demi tumbuh kembang anak yang optimal. Jika anak sehat, tumbuh kembangnya optimal...
                  </p>
                  <p class="card-text"><small class="text-muted">Published 10 Mei 2023</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


</div>
@endsection