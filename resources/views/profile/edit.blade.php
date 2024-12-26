@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-6">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
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
          <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
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
                  <input type="text" id="phoneNumber" name="phone_number" class="form-control" placeholder="{{$user->phone_number}}">
                </div>
              </div>
              <div class="col-md-6">
                <label for="zipCode" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" maxlength="" value="{{$user->password}}">
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
</div>
@endsection