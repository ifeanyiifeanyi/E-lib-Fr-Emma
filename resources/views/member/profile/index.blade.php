@extends('member.layouts.memberLayout')

@section('title', 'Profile')
@section('css')

@endsection


@section('member')
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">@yield('title')</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center d-flex flex-column align-items-center">
                                <img src="{{ asset(auth()->user()->photo) }}" alt="Admin"
                                    class="p-1 rounded-circle bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ Str::title(Auth::user()->name) }}</h4>
                                    <p class="mb-1 text-secondary">{{ Str::title(Auth::user()->username) }}</p>
                                    <p class="text-muted font-size-sm">{{ Str::lower(Auth::user()->email) }}</p>
                                    <p class="text-muted font-size-sm">{{ Str::lower(Auth::user()->phone) }}</p>
                                    <p class="text-muted font-size-sm"> Activation Code: <b>{{
                                            Str::lower(Auth::user()->pass_code == 0 ? 'N/A' : Auth::user()->pass_code)
                                            }}</b></p>
                                    <a href="{{ route('member.updatePassword.view') }}" class="btn btn-primary">Update
                                        Password</a>
                                </div>
                            </div>
                            <hr class="my-4" />

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('member.profile.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ old('name', $user->name) }}"
                                        name="name" />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ old('username', $user->username) }}"
                                        name="username" />
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="{{ old('email', $user->email) }}"
                                        name="email" />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" class="form-control" value="{{ old('phone', $user->phone) }}" name="phone" />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Profile Photo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input onChange="changeImg(this)" type="file" accept="image/*" capture class="form-control" name="photo" />
                                </div>
                                <div class="col-md-5">
                                    <img id="previewImage"  src="{{ asset($user->photo) }}" alt="" class="img-fluid img-responsive w-50 img-thumbnail">
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="px-4 btn btn-primary" value="Save Changes" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script>
    function changeImg(input) {
        let preview = document.getElementById('previewImage');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection