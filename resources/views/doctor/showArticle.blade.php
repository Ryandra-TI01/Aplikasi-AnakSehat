@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">
                        @switch(Route::currentRouteName())
                            @case('showArtikel') Detail Artikel @break
                            @case('editArtikel') Edit Artikel @break
                            @case('createArtikel') Tambah Artikel @break
                        @endswitch
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ 
                        Route::currentRouteName() === 'createArtikel' 
                        ? route('storeArtikel') 
                        : route('updateArtikel', $artikel->id ?? '') 
                    }}" 
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Route::currentRouteName() == 'editArtikel')
                    @method('PUT')
                    @endif
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Penulis</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                        ></span>
                        <input
                            value="Dr. {{ $penulis->name }}"
                            type="text"
                            class="form-control"
                            id="doctor_name"
                            name="doctor_name"
                            placeholder="John Doe"
                            aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2" 
                            disabled />
                        </div>
                    </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Judul Artikel</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><rect width="36" height="36" x="6" y="6" rx="3"/><path stroke-linecap="round" d="M16 19v-3h16v3M22 34h4m-2-16v16"/></g></svg>
                            </span>
                            <input
                                value="{{ $artikel->title ?? ''}}"
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                placeholder="Title"
                                aria-label="Title"
                                aria-describedby="basic-icon-default-email2" 
                                {{ Route::currentRouteName() === 'showArtikel' ? 'disabled' : '' }}/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Publish</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/></svg>                            
                            </span>
                                <input class="form-control" type="date" 
                                    value="{{ $artikel->date ?? '' }}"
                                    id="date" name="date"
                                    {{ Route::currentRouteName() === 'showArtikel' ? 'disabled' : '' }}/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Isi Artikel</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" id="content" name="content" rows="3"
                                    {{ Route::currentRouteName() === 'showArtikel' ? 'disabled' : '' }}>{{ $artikel->content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Upload Gambar</label>
                        <div class="col-sm-10">
                            @if (!empty($artikel->image))
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <img src="{{ asset('storage/' . $artikel->image) }}" alt="Gambar Artikel" width="300" class="rounded">
                            </div>
                                @endif
                                @if (Route::currentRouteName() !== 'showArtikel')
                                    <input type="file" id="image" name="image" class="form-control">
                                @endif
                        </div>
                    </div>
                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{ Auth::id() }}">
                    @if (Route::currentRouteName() == 'editArtikel')
                    <input type="hidden" name="id" id="id" value="{{ $artikel->id }}">
                    @endif
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('indexArtikel') }}" class="btn btn-danger me-5">Kembali</a>
                            @if(Route::currentRouteName() !== 'showArtikel')
                            <button type="submit" class="btn btn-primary">
                               {{ Route::currentRouteName() === 'editArtikel' ? 'Ubah' : 'Submit' }}
                            </button>
                            @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection