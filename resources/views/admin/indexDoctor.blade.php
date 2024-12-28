@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
    <h5 class="card-header">Data Dokter</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center">NO</th>
                    <th style="width:25%" class="text-center">NAMA</th>
                    <th style="width:25%" class="text-center">EMAIL</th>
                    <th style="width:25%" class="text-center">No Telepon</th>
                    <th style="width:25%" class="text-center">Status</th>
                    <th style="width:15%" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($iDokter as $dokter)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $dokter->name }}</td>
                <td class="text-center">{{ $dokter->email }}</td>
                <td class="text-center">{{ $dokter->phone_number }}</td>
                <td class="text-center">
                    @if ($dokter->status === 'Sudah Terverifikasi')
                        <svg style="background-color: #6200EE; color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/>
                        </svg>
                    @elseif ($dokter->status === 'rejected')
                        <svg width="24" height="24" id="Layer_1" style="background-color: #E53935; color: white;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="currentColor" d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" xml:space="preserve">
                            <circle fill="#BDBDBD" cx="256" cy="256" r="246"/>
                            <path fill="currentColor" d="M236.02 107h40v244h-40z"/>
                            <g><path fill="#EDEFF1" d="M236.02 107h40v244h-40z"/>
                            <circle fill="#EDEFF1" cx="256" cy="395" r="26"/></g>
                        </svg>
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
                        <a class="dropdown-item" href="{{ route('showDokter',  $dokter->id) }}"
                        ><i class="bx bx-show me-1"></i> Show</a
                        >
                        <a class="dropdown-item" href="{{ route('editDokter', $dokter->id) }}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <form action="{{ route('deleteDokter', $dokter->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
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