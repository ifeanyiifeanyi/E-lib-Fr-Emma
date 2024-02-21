@extends('layouts.authLayout')

@section('title', 'Login')

@section('auth')

<div class="wrapper">
    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">

                <div
                    class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                    <div class="mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body">
                            <img src="{{ asset("") }}assets/images/login-images/login-cover.svg"
                                class="img-fluid auth-img-cover-login" width="650" alt="" />
                        </div>
                    </div>

                </div>

                <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                    <div class="m-3 mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body p-sm-5">
                            <div class="">
                                <div class="mb-3 text-center">
                                    <img src="assets/images/logo-icon.png" width="60" alt="">
                                </div>
                                <div class="mb-4 text-center">
                                    <h5 class="">Admin Sign In</h5>
                                    <p class="mb-0">Please log in to your account</p>
                                </div> @if(session('status'))
                                <div class="mb-4 alert alert-danger">
                                    <ul>
                                        @foreach(session('status') as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="form-body">
                                    <form class="row g-3" method="post" action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email</label>
                                            <input name="email" value="{{ old('email') }}" type="email"
                                                class="form-control" id="inputEmailAddress"
                                                placeholder="jhon@example.com">
                                            @error('email')
                                            <i class="text-danger">{{ $message }}</i>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input name="password" type="password" class="form-control border-end-0"
                                                    id="inputChoosePassword" value="" placeholder="Enter Password"> <a
                                                    href="javascript:;" class="bg-transparent input-group-text"><i
                                                        class="bx bx-hide"></i></a>
                                                @error('password')
                                                <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="remember" type="checkbox"
                                                    id="remember">
                                                <label class="form-check-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end"> <a href="{{ route('password.request') }}">Forgot
                                                Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-center ">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="{{ route('register') }}">Sign up here</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>
</div>



@endsection
