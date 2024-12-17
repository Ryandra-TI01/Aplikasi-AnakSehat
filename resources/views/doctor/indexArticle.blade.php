@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-header">Data Artikel Saya</h5>
            <a class="btn btn-primary me-5 text-white">
                Tambah Artikel
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
            </a>
        </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center">NO</th>
                    <th style="width:25%" class="text-center">NAMA PENULIS</th>
                    <th style="width:25%" class="text-center">JUDUL ARTIKEL</th>
                    <th style="width:25%" class="text-center">PUBLISH</th>
                    <th style="width:15%" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Ryandra Athaya Saleh</td>
                <td class="text-center">Cara mencegah Stunting Sejak Dini</td>
                <td class="text-center">17 Januari 2021</td>
                <td>
                <div class="dropdown">
                    <button
                    type="button"
                    class="btn p-0 dropdown-toggle hide-arrow"
                    data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                    >
                    </div>
                </div>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    <!--/ Bordered Table -->
</div>
@endsection