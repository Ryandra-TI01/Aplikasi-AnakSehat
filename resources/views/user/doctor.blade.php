@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card bg-primary text-white mb-6">
        <div class="card-body">
          <h4 class="card-title text-white">Chat Dokter</h4>
          <p class="card-text">
            Cari dokter terbaik dan layanan terbaik disini
          </p>
        </div>
    </div>
    <div class="row mb-12 g-6">
        @foreach($doctors as $doctor)
            <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="d-flex justify-content-center">
                    <img class="w-50" src="{{asset('user/img/kids1.jpg')}}" alt="Card image cap">
                </div>
                <div class="card-body">
                <h5 class="card-title">Doctor {{$doctor->name}}</h5>
                <p class="card-text">
                    status:
                    @if ($doctor->status == 'Sudah Terverifikasi')
                        <span class="badge bg-label-success">Sudah Terverifikasi</span>
                    @endif
                </p>
                <a href="/doctor-detail/{{$doctor->id}}" class="btn btn-outline-primary">Chat Dokter</a>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection