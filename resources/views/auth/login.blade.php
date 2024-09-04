@extends('auth.app')
@section('title')
    Login
@endsection
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets') }}/images/logo png.png" alt="logo" width="250" height="50">
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control @error('email')is-invalid @enderror form-control-lg"
                                        placeholder="Email" name="email" id="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror form-control-lg"
                                        id="password" placeholder="Password" name="password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- Include FontAwesome (if not already included) -->
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                                
                                <script>
                                    document.querySelector('.toggle-password').addEventListener('click', function () {
                                        let passwordInput = document.getElementById('password');
                                        let icon = this;
                                        // Toggle the input type
                                        if (passwordInput.type === 'password') {
                                            passwordInput.type = 'text';

                                            icon.classList.remove('fa-eye-slash');
                                            icon.classList.add('fa-eye');
                                            
                                        } else {
                                            passwordInput.type = 'password';
                                            

                                            icon.classList.remove('fa-eye');
                                            icon.classList.add('fa-eye-slash');
                                        }
                                    });
                                </script>
                                



                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="rememberme" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Lupa Password ?<a href="{{ route('helpdesk.user') }}" class="text-primary">Klik Disini</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Cek Tiket Anda ?<a href="{{ route('helpdesk.cektiket') }}" class="text-primary">Klik Disini</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
