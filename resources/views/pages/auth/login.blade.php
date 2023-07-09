@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="col-xl-9">
    <div class="auth-full-bg pt-lg-5 p-4">
        <div class="w-100">
            <div class="bg-overlay"></div>
        </div>
    </div>
</div>
<!-- end col -->

<div class="col-xl-3">
    <div class="auth-full-page-content p-md-5 p-4">
        <div class="w-100">

            <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5">
                    <a href="{{route('landing')}}" class="d-block auth-logo">
                        <h2 class="logo1 text-uppercase">I-SKSO</h2>
                        <img src="" alt="" height="18" class="auth-logo-dark">
                        <img src="" alt="" height="18" class="auth-logo-light">
                    </a>
                </div>
                <div class="my-auto">
                    
                    <div>
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue</p>
                    </div>

                    <div class="mt-4">
                        @if ($errors->has('login_error'))
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Login',
                                    text: '{{ $errors->first('login_error') }}',
                                });
                            </script>
                        @endif
                        <form method="POST" action={{route('login')}}>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email">
                            </div>
    
                            <div class="mb-3">
                                
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                                <div class="float-end">
                                    <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                </div>
                            </div>
    
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-check">
                                <label class="form-check-label" for="remember-check">
                                    Remember me
                                </label>
                            </div>
                            
                            <div class="mt-3 d-grid">
                                <button  class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                            </div>

                        </form>
                        <div class="mt-5 text-center">
                            {{-- <p>Don't have an account ? <a href="{{route('Register.index')}}" class="fw-medium text-primary"> Signup now </a> </p> --}}
                        </div>
                    </div>
                </div>

                <div class="mt-4 mt-md-5 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> I-SKSO </p>
                </div>
            </div>
            
            
        </div>
    </div>
</div>

@endsection