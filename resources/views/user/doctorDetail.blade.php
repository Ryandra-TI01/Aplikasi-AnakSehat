@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body overflow-hidden">
            <img src="{{asset('doctor/img/doctor.png')}}" alt="" style="width: 100%; height:200px;object-fit: contain">
        </div>
        <h3 class="card-header">Doctor {{ $doctor->name }}</h3>
        <div class="card-body">
            @if ($doctor->status == 'Sudah Terverifikasi')
                <span class="ms-2 badge bg-label-success mb-6">{{$doctor->status}}</span>
            @endif
            <form method="POST" action="/consultation/send">
                @csrf
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-message">Pilihan anda</label>
                    <div class="col-sm-10">
                        <select name="child_id" required class="form-select">
                            <option selected disabled value="">Pilih anak anda</option>
                            @foreach ($child as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- percobaan --}}
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-message">Keluhan Anda</label>
                    <div class="col-sm-10">
                        <textarea id="basic-icon-default-message" name="pesan" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" rows="3"></textarea>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    {{-- percobaan --}}
</div>
@endsection