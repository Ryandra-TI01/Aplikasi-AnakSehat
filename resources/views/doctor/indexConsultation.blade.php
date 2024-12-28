@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-header">Data Konsultasi Saya</h5>
        </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center">NO</th>
                    <th style="width:25%" class="text-center">NAMA PENGGUNA</th>
                    <th style="width:25%" class="text-center">TOPIK KONSULTASI</th>
                    <th style="width:25%" class="text-center">TANGGAL</th>
                    <th style="width:25%" class="text-center">STATUS</th>
                    <th style="width:15%" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($consultations as $k)    
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $k->user->name }}</td>
                <td class="text-center">{{ Str::limit($k->pesan, 20) }}</td>
                <td class="text-center">{{ optional($k->created_at)->format("d F Y") }}</td>
                <td class="text-center">
                    @if ($k->status === 'responded')
                        <div class="d-flex align-items-center justify-content-center">
                            Terjawab
                            <svg class="ms-2" style="background-color: #6200EE;color:white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center">
                            Belum Terjawab
                            <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" xml:space="preserve">
                                <circle fill="#BDBDBD" cx="256" cy="256" r="246"/>
                                <path fill="currentColor" d="M236.02 107h40v244h-40z"/>
                                <g><path fill="#EDEFF1" d="M236.02 107h40v244h-40z"/>
                                <circle fill="#EDEFF1" cx="256" cy="395" r="26"/></g>
                            </svg>
                        </div>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button
                        type="button"
                        class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route("showKonsul", $k->id) }}"
                                ><i class="bx bx-chat me-1"></i>Respond</a
                            >
                            <form action="{{ route("deleteRespon", $k->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="dropdown-item" type="submit" 
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                >
                                    <i class="bx bx-trash me-1"></i> Delete
                                </button>
                            </form>
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
    <!--/ Bordered Table -->
    
</div>
@endsection