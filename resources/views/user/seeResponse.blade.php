@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
     @endif   
        
    @foreach ($consultation as $k)    
    <div class="accordion mt-4" id="accordionExample">
        <div class="card accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#{{$loop->iteration}}" aria-expanded="false" aria-controls="{{$loop->iteration}}">
                Konsultasi Anak {{$k->child->nama}} 
                @if ($k->status == 'responded')
                    <span class="ms-3 badge bg-label-success">{{$k->status}}</span>
                @else
                    <span class="ms-3 badge bg-label-warning">{{$k->status}}</span>
                @endif
              </button>
            </h2>
            <div id="{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
              <div class="accordion-body">
                <p>Status Konsultasi: {{ $k->status }}</p>
                <p>Tanggal Konsultasi: {{ $k->created_at }}</p>
                <p>Keluhan: {{ $k->pesan }}</p>
                @if ($k->status == 'responded')                    
                    <p>Respon Dokter: {{ $k->response->respon }}</p>
                    <p>Dokter: {{ $k->response->doctor->name }}</p>
                @else
                    <p>Dokter: {{ $k->doctor->name }}</p>
                @endif
              </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection