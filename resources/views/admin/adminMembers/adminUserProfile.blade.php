@extends('admin.layouts.adminLayout')

@section('current_page', 'View Staff Profile')
@section('title', 'View Staff Profile')

@section('css')


@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="mx-auto col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid w-50" src="{{ asset($user->photo) }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="text-center profile-username">{{ Str::title($user->name) }}</h3>

                            <p class="text-center text-muted"><b>Role: </b> {{ Str::title($user->role) }}</p>
                            @if ($user->super_access)
                                <p class="text-center text-success">Super Admin</p>
                            @endif

                            <ul class="mb-3 list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right">{{ $user->username }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone Number</b> <a class="float-right">{{ $user->phone ?? 'N/A' }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    
@endsection


@section('js')

    <script>
        function changeImg(input) {
            let preview = document.getElementById('previewImage');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
