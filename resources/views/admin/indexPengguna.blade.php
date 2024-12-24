@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
    <h5 class="card-header">Data Pengguna</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center">NO</th>
                    <th style="width:25%" class="text-center">NAMA</th>
                    <th style="width:25%" class="text-center">EMAIL</th>
                    <th style="width:25%" class="text-center">ANAK</th>
                    <th style="width:15%" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $iPengguna)    
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $iPengguna->name }}</td>
                    <td>{{ $iPengguna->email }}</td>
                    <td>
                        @if ($iPengguna->child->isEmpty())
                            Data tidak tersedia
                        @else
                            {{ $iPengguna->child->pluck("nama")->implode(", ") }}
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
                            <a class="dropdown-item" href="{{ route("showPengguna",  $iPengguna->id) }}"
                            ><i class="bx bx-show me-1"></i> Show</a
                        >
                        <a class="dropdown-item" href="{{ route("editPengguna", $iPengguna->id) }}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <form action="{{ route("deletePengguna", $iPengguna->id) }}" method="POST">
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