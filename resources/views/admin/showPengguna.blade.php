@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Pengguna</h5>
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
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-message">Anak</label>
                    <div class="col-sm-10">
                        <div class="card text-bg-light mb-3 bg-white" style="max-width: 18rem;">
                            <h3 class="card-header">Anton</h3>
                            <div class="card-body">
                              <p class="card-text">Umur : 2 tahun</p>
                              <p class="card-text">Gender : 2 tahun</p>
                              <p class="card-text">Tanggal Lahir : 2 tahun</p>
                              <p class="card-text">Status : Gizi Normal</p>
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