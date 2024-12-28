@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="alert alert-warning" role="alert">
        Perhatian untuk update perkembangan anak setiap <span class="fw-bold">sebulan</span> sekali
      </div>
    <div class="row mb-6">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <label class="form-label" for="basic-default-fullname">Nama Anak :</label>
                    <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{ $child->nama }}" disabled>
                  <div class="card-text row">
                    <div class="col-6">
                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir :</label>
                        <input type="text" class="form-control mb-3" id="tanggal_lahir" value="{{ $child->tanggal_lahir }}" disabled>
                        <label class="form-label" for="basic-default-fullname">Umur:</label>
                        <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{ $child->umur }} Bulan" disabled>
                        <label class="form-label" for="basic-default-fullname">Gender:</label>
                        <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{ $child->jenis_kelamin }}" disabled>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="basic-default-fullname">Tinggi Badan:</label>
                        <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{$latestChildHealthData->tinggi ?? ''}} cm" disabled>
                        <label class="form-label" for="basic-default-fullname">Berat Badan:</label>
                        <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{$latestChildHealthData->berat ?? ''}} kg" disabled>
                        <label class="form-label" for="basic-default-fullname">Status Gizi:</label>
                        <input type="text" class="form-control mb-3" id="basic-default-fullname" value="{{$latestChildHealthData->status_gizi ?? ''}}" disabled>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('simpanPerkembangan', $child->id) }}">
                        @csrf
                        <div class="mb-6">
                            <label for="bulan" class="form-label">Umur (bulan) :</label>
                            <input type="number" name="bulan" class="form-control" id="bulan" min="1" max="60" required>
                        </div>
                        <div class="mb-6">
                            <label for="tinggi" class="form-label">Tinggi Badan (cm):</label>
                            <input type="number" step="0.1" name="tinggi" class="form-control" id="tinggi" required>
                        </div>
                        <div class="mb-6">
                            <label for="berat" class="form-label">Berat Badan (kg):</label>
                            <input type="number" step="0.1" name="berat" class="form-control" id="berat" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <div class="card">
        <h5 class="card-header">Data Perkembangan Anak</h5>
        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Umur</th>
                  <th>Tinggi Badan</th>
                  <th>Berat Badan</th>
                  <th>Status Gizi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($childHealthData as $record)
                <tr>
                    <td>{{ $record->bulan }} Bulan</td>
                    <td>{{ $record->tinggi }} cm</td>
                    <td>{{ $record->berat }} kg</td>
                    <td>{{ $record->status_gizi }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection