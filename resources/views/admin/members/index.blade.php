@extends('admin.layouts.adminLayout')

@section('current_page', 'Users Management')
@section('title', 'Users Management')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto col-md-12">

                <div class="table-responsive">
                    <div class="mb-5 card-header">
                        <h3 class="card-title">Details of all members</h3>
                    </div>
                    {{-- @if($books->count()) --}}
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 25px">s/n</th>
                                    <th style="width: 125px">Name</th>
                                    <th style="width: 125px">Username</th>
                                    <th style="width: 125px">Email</th>
                                    <th style="width: 25px !important">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::title($user->name) }}</td>
                                    <td>
                                       <p>{{ Str::title($user->username) }}</p>
                                       <p class="{{ $user->email_verified_at ? 'text-success' : 'text-danger'  }}">
                                        {{ empty($user->email_verified_at) ? 'Not Verified' : 'Verified Account' }}
                                       </p>
                                    </td>
                                    <td>{{ Str::lower($user->email) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.members.show', ['member' => $user]) }}" class="btn btn-info"><i class="fas fa-eye"> View</i></a>

                                            <a onclick="return confirm('Are you sure')" href="{{ route('admin.members.delete', ['member' => $user]) }}"
                                                class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                            <a onclick="return confirm('Are you sure of this action ?')" href="{{ route('admin.staff.makeRole', $user->username) }}" class="btn btn-warning"><i class="fab fa-adn"
                                                    aria-hidden="true"></i> Make Staff</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <p class="text-center alert alert-danger">Not Available</p>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    {{-- @else
                    <div class="alert alert-danger">No Code Available</div>
                    @endif --}}
                    <!-- /.card-header -->


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
