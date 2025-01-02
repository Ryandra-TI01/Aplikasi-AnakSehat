@extends('layouts.userAutentikasi') 
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
                            <div class="app-brand-text demo text-heading fw-medium mb-2">Anak Sehat - Admin</div>
                        </div>
                    </div>
    
                    <form method="POST" action="/admin/register">
                        @csrf
                        @if (session('error'))
                        <div class="alert alert-danger mb-4">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="mb-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" placeholder="Enter your name" autofocus="" value="{{ old('name') }}" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Enter your phone number" value="{{ old('phone_number') }}" />
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="············" aria-describedby="password" oninput="syncPassword()" value="{{ old('password') }}"/>
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Hidden Confirm Password -->
                        <input type="hidden" id="password_confirmation" name="password_confirmation" />
                        
                        <div class="my-8">
                            <div class="form-check mb-0 ms-2">
                                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" required value="{{ old('terms') }}">
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy &amp; terms</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="/admin/login">
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
    <script>
        function syncPassword() {
            const password = document.getElementById('password').value;
            document.getElementById('password_confirmation').value = password;
        }
    </script>
    
</div>
@endsection
