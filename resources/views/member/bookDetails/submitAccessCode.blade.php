@extends('member.layouts.memberLayout')

@section('title', 'Submit Activation Code')
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
                
                <div class="mx-auto col-md-8">
                    <form action="" method="POST">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Activation Code</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="pass_code" />
                                    @error('pass_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Account Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="password" />
                                    <small class="text-muted">Account password request is to prove ownership of the account</small>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="px-4 btn btn-primary" value="Submit Code .." />
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