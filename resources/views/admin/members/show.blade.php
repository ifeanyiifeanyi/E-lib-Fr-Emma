@extends('admin.layouts.adminLayout')

@section('current_page', 'User Profile')
@section('title', Str::title($user->name))

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid w-50" src="{{ asset($user->photo) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Str::title($user->name) }}</h3>

                        <p class="text-muted text-center"><b>Role: </b> {{ Str::title($user->role) }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right">{{ Str::lower($user->username) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number</b> <a class="float-right">{{ $user->phone ?? 'N/A' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Access Code </b>
                                <a class="float-right">
                                    @if ($user->pass_code == "null")
                                    <code class="btn btn-danger shadow float-right" disabled>
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                        Book Access Denied
                                    </code>
                                    @else
                                    <code class="float-right btn btn-info">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                        {{ $user->pass_code }}
                                    </code>
                                    @endif
                                </a>
                            </li>
                        </ul>

                        @if (!isset($user->email_verified_at))
                        <code class="btn btn-danger btn-block" disabled>
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            <b>Unverified Account </b>
                        </code>
                        @else
                        <code class="btn btn-success">
                            <b>
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                               User Account Verified
                            </b>
                        </code>
                        @endif
                        <hr>
                        <div class="container">
                            @if (!isset($user->email_verified_at))
                            <a onclick="return confirm('Are you sure of this Action')" href="{{ route('admin.members.verify', ['member' => $user]) }}" class="btn btn-primary"><b>Verify User Account</b></a>

                            @else
                            <a onclick="return confirm('Are you sure of this Action')" href="{{ route('admin.members.deactivate', ['member' => $user]) }}" class="btn btn-danger"><b>Deactivate Account</b></a>
                            @endif

                            @if ($user->pass_code == "null")
                            <a href="{{ route('admin.members.setCode', ['member' => $user]) }}" class="btn btn-info"><b>Active Code for User Account</b></a>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            {{-- COME LATER AND LIST READ BOOKS FOR THIS USER --}}
            <div class="col-md-6">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List of books read</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection


@section('js')


@endsection
