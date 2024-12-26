@extends('layouts.doctor')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <form id="send-verification" method="post" action="{{ route('doctor.verification.send') }}">
        @csrf
       </form>
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Profile Dokter</h5>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('doctor.profile.update') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row mb-6">
                      @if (session('status') === 'profile-updated')
                      <span class="alert alert-success">{{ __('Saved.') }}</span>
                     @endif
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
                            aria-describedby="basic-icon-default-fullname2"
                            name="name"
                            value="{{$user->name}}" 
                            />
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
                                aria-describedby="basic-icon-default-email2"
                                name="email"
                                value="{{$user->email}}"
                                />
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
                                aria-describedby="basic-icon-default-phone2" 
                                name="phone_number"
                                value="{{$user->phone_number}}"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                        <div class="col-sm-10">
                          <span class="d-flex align-items-center">
                            @if ($user->status == "Sudah Terverifikasi")
                                <span class="fw-bold">Terverifikasi</span>
                                <svg class="ms-2" style="background-color: #6200EE;color:white;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
                            @elseif ($user->status == "Belum Terverifikasi")
                                <span class="fw-bold">Belum Terverifikasi</span>
                                <svg class="ms-2"  style="background-color: #eeea00;color:white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g class="alert-outline"><g fill="#000" class="Vector"><path fill-rule="evenodd" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10m-10 8a8 8 0 1 0 0-16a8 8 0 0 0 0 16" clip-rule="evenodd"/><path fill-rule="evenodd" d="M12 14a1 1 0 0 1-1-1V8a1 1 0 1 1 2 0v5a1 1 0 0 1-1 1" clip-rule="evenodd"/><path d="M11 16a1 1 0 1 1 2 0a1 1 0 0 1-2 0"/></g></g></svg>
                            @else
                                <span class="fw-bold">Rejected</span>
                                <svg class="ms-2" style="background-color: #ee0000;color:white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg>
                            @endif
                        </span>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="certificate" name="certificate">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Certficate</label>
                        <div class="col-sm-10">
                          <div class="card position-relative text-bg-white mb-3" style="max-width: 18rem;">
                            <a href="#" class="position-absolute" style="top: 3%; right: 3%; width: 24px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/>
                                </svg>
                            </a>
                            <div class="card-body">
                                @if ($user->certificate)
                                    <img src="{{ asset('storage/' . $user->certificate) }}" alt="Certificate" width="100%" data-bs-toggle="modal" data-bs-target="#imageModal">
                                @else
                                    <p>No certificate uploaded</p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Certificate Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        @if ($user->certificate)
                                            <img src="{{ asset('storage/' . $user->certificate) }}" alt="Certificate" class="img-fluid">
                                        @else
                                            <p>No certificate uploaded</p>
                                        @endif
                                    </div>
                                </div>
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
{{-- <div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-6">
        <form id="send-verification" method="post" action="{{ route('doctor.verification.send') }}">
          @csrf
         </form>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
            <img src="{{asset('admin/assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>
  
              <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
          </div>
        </div>
        <div class="card-body pt-4">
          <form method="post" action="{{ route('doctor.profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div class="row g-6">
              @if (session('status') === 'profile-updated')
              <span class="alert alert-success">{{ __('Saved.') }}</span>
             @endif
              <div class="col-md-6">
                <label for="firstName" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" id="firstName" name="name" value="{{$user->name}}" autofocus="">
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" placeholder="john.doe@example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">ID (+62)</span>
                  <input type="text" id="phoneNumber" name="phone_number" class="form-control" value="{{$user->phone_number}}">
                </div>
              </div>
              <div class="col-md-6">
                <label for="zipCode" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" maxlength="" value="{{$user->password}}">
              </div>
            </div>
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-6 col-12 mb-0">
            <div class="alert alert-warning">
              <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check my-8 ms-2">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
              <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
