@extends('layouts.authLayout')

@section('title', 'Sign up')

@section('auth')
<div class="wrapper">
    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">

                <div
                    class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                    <div class="mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body">
                            <img src="{{ asset("") }}assets/images/login-images/register-cover.svg"
                                class="img-fluid auth-img-cover-login" width="550" alt="" />
                        </div>
                    </div>

                </div>

                <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                    <div class="m-3 mb-0 bg-transparent shadow-none card rounded-0">
                        <div class="card-body p-sm-5">
                            <div class="">
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('logo.png') }}" width="60" alt="" />
                                </div>
                                <div class="mb-4 text-center">
                                    <p class="mb-0">Please fill the below details to create your account</p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputUsername"
                                                placeholder="Jhon Doe" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="inputUsername"
                                                placeholder="Jhon" value="{{ old('username') }}">
                                            @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                                placeholder="example@user.com" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0"
                                                    id="inputChoosePassword" name="password"
                                                    placeholder="Enter Password"> <a href="javascript:;"
                                                    class="bg-transparent input-group-text"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0"
                                                    id="inputChoosePassword" name="password_confirmation"
                                                    placeholder="Enter Password"> <a href="javascript:;"
                                                    class="bg-transparent input-group-text"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                            @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and
                                                    agree to Terms & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Sign up</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-center ">
                                                <p class="mb-0">Already have an account? <a
                                                        href="{{ route('login') }}">Sign in here</a></p>
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