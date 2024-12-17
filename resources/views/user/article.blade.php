@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="input-group input-group-merge mb-6 m-auto" style="width: 40%">
        <span id="basic-icon-default-fullname2" class="input-group-text bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14"/></svg>
        </span>
        <input type="text" class="form-control bg-white" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
    </div>
    <div class="d-flex justify-content-evenly mb-6 m-auto" style="width: 40%">
        @for($i = 0; $i < 3; $i++)
            <a href="">
                <span class="badge bg-label-primary">Primary</span>
            </a>
            <a href="">
                <span class="badge bg-label-secondary">Secondary</span>
            </a>
        @endfor
    </div>
    <h4>
        Rekomendasi artikel untukmu
    </h4>
    <div class="row mb-12 g-6">
        @for($i = 0; $i < 4; $i++)
        <div class="col-6">
          <div class="card">
            <div class="d-flex">
              <div class="d-flex justify-content-center align-items-center overflow-hidden">
                <a href="">
                    <img class="card-img card-img-left" style="object-fit: cover" src="https://images.unsplash.com/photo-1581578021450-fbd19fba0e63?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aGVhbHRoJTIwY2hpbGR8ZW58MHx8MHx8fDA%3D" alt="Card image">
                </a>
              </div>
              <div>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="">5 Tips Menjaga Kesehatan Anak</a>
                  </h5>
                  <p class="card-text">
                    Menjaga kesehatan anak adalah hal utama yang penting dilakukan oleh setiap orang tua demi tumbuh kembang anak yang optimal. Jika anak sehat, tumbuh kembangnya optimal...
                  </p>
                  <p class="card-text"><small class="text-muted">Published 10 Mei 2023</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endfor
    </div>
</div>
@endsection