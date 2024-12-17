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
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Ryandra Athaya Saleh</td>
                <td class="text-center">ryandra@gmail.com</td>
                <td class="text-center">01234566654</td>
                <td class="text-center">
                    <svg style="background-color: #6200EE;color:white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
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