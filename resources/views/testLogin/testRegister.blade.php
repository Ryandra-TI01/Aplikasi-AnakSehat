@extends('layouts.testLogin') 
@section('content')
<div style="width: 100vw;height:100vh;" class="d-flex justify-content-center align-items-center" >
    <div class="authentication-wrapper authentication-basic container-p-y" style="width: 40%;max-width: 500px;">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card px-sm-6 px-0">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{asset('admin/assets/img/logo-rpl.jpeg')}}" alt="" width="50px">
                            <div class="app-brand-text demo text-heading fw-medium mb-2">Anak Sehat - Doctor</div>
                        </div>
                    </div>
    
                    <form id="formAuthentication" class="mb-6" action="index.html">
                        <div class="mb-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama-username" placeholder="Enter your name" autofocus="" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email-username" placeholder="Enter your email" autofocus="" />
                        </div>
                        <div class="mb-6">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number" autofocus="" />
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="my-8">
                            <div class="form-check mb-0 ms-2">
                              <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                              <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy &amp; terms</a>
                              </label>
                            </div>
                          </div>
                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="auth-login-basic.html">
                          <span>Sign in instead</span>
                        </a>
                      </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    <div class="rounded-circle overflow-hidden" style="position: absolute; bottom: 10%; right: 10%;z-index: -10;">
        <img class="object-fit:cover" style="width: 400px; height:auto; z-index: -10;"  src="https://img.freepik.com/premium-vector/immunization-kids-abstract-concept-vector-illustration_107173-33853.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
    </div>
    <div class="rounded-circle overflow-hidden" style="position: absolute; top: 10%; left: 8%; z-index: -10;">
        <img class="object-fit:cover" style="width: 400px; height:auto;z-index: -10;"  src="https://img.freepik.com/premium-vector/medical-social-worker-helps-patients_701961-8588.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
    </div>
</div>
@endsection
