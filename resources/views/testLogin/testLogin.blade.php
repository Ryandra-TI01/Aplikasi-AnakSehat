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
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email-username" placeholder="Enter your email" autofocus="" />
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="d-flex justify-content-between mt-8">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="auth-forgot-password-basic.html">
                                    <span>Forgot Password?</span>
                                </a>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="auth-register-basic.html">
                            <span>Create an account</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    <div class="rounded-circle overflow-hidden" style="position: absolute; top: 10%; right: 10%;z-index: -10;">
        <img class="object-fit:cover" style="width: 400px; height:auto;z-index: -10;"  src="https://img.freepik.com/premium-vector/medical-social-worker-helps-patients_701961-8588.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
    </div>
    <div class="rounded-circle overflow-hidden" style="position: absolute; bottom: 10%; left: 8%; z-index: -10;">
        <img class="object-fit:cover" style="width: 400px; height:auto; z-index: -10;"  src="https://img.freepik.com/premium-vector/immunization-kids-abstract-concept-vector-illustration_107173-33853.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
    </div>
</div>
@endsection
