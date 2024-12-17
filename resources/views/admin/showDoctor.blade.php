@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Profile Dokter</h5>
                </div>
                <div class="card-body">
                <form>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                        ></span>
                        <input
                            type="text"
                            class="form-control"
                            id="basic-icon-default-fullname"
                            placeholder="John Doe"
                            aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    </div>
                    <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                aria-describedby="basic-icon-default-email2" />
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Phone No</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                            ></span>
                            <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="1">
                                    Belum Terverifikasi
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
                                    </span>
                                </option>
                                <option value="2">Sudah Terverifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Certficate</label>
                        <div class="col-sm-10">
                            <div class="card text-bg-white mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                  <img src="{{asset('admin/assets/img/sertifikat.jpg')}}" width="100%" alt="">
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Artikel</label>
                        <div class="col-sm-10">
                            <div class="card text-bg-white mb-3" style="max-width: 18rem;">
                                <h5 class="card-header">Cara Mencegah Stunting</h5>
                                <div class="card-body">
                                  <p class="card-text">publish : 10 Januari 2021</p>
                                  <a class="card-text text-decoration-underline" style="color: #696CFF">Detail Artikel
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17H7q-2.075 0-3.537-1.463T2 12t1.463-3.537T7 7h4v2H7q-1.25 0-2.125.875T4 12t.875 2.125T7 15h4zm-3-4v-2h8v2zm5 4v-2h4q1.25 0 2.125-.875T20 12t-.875-2.125T17 9h-4V7h4q2.075 0 3.538 1.463T22 12t-1.463 3.538T17 17z"/></svg>
                                  </a>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection