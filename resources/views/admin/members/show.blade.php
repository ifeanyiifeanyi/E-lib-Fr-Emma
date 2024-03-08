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
                            <img class="profile-user-img img-thumbnail img-fluid w-50" src="{{ asset($user->photo) }}" alt="User profile picture">
                        </div>

                        <h3 class="text-center profile-username">{{ Str::title($user->name) }}</h3>

                        <p class="text-center text-muted"><b>Role: </b> {{ Str::title($user->role) }}</p>

                        <ul class="mb-3 list-group list-group-unbordered">
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
                                    @if ($user->pass_code === 0)
                                    <code class="float-right text-danger" disabled>
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                        Book Access Denied
                                    </code>
                                    @else
                                    <code class="float-right text-info">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                        {{ $user->pass_code }}
                                    </code>
                                    @endif
                                </a>
                            </li>
                        </ul>

                        @if (!isset($user->email_verified_at))
                        <code class="text-danger" disabled>
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            <b>Unverified Account </b>
                        </code>
                        @else
                        <code class="text-success">
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

                            @if ($user->pass_code === 0)
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
                    @forelse ($user->viewedBooks as $userBook)
                    <div class="card-body">
                        <strong><i class="mr-1 fas fa-book"></i>{{ Str::title($userBook->book->title) }}</strong>

                        <p class="text-muted">
                            <i class="mr-1 far fa-clock"></i>
                            {{ \Carbon\Carbon::parse($userBook->created_at)->format('jS F, Y') }}
                        </p>
                        <p class="text-muted">
                            Author: <b class="text-info">{{ $userBook->book->author }}</b>
                        </p>

                        <hr>
                    </div>    
                    @empty
                        <div class="m-5 alert alert-info">
                            User has not read any book, for now
                        </div>
                    @endforelse
                    
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
