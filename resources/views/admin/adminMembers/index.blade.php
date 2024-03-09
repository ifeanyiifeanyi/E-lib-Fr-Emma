@extends('admin.layouts.adminLayout')

@section('current_page', 'Staff Management')
@section('title', 'Staff Management')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto col-md-12">

                <div class="table-responsive">
                    <div class="mb-5 card-header">
                        <h3 class="card-title">Details of Admin(staff) members</h3>
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
                                @forelse($admins as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <p>
                                            {{ Str::title($user->name) }}

                                        </p>

                                        <small class="text-success">
                                            {{ $user->super_access == '1' ? 'super' : '' }}
                                            </sma>
                                    </td>
                                    <td>
                                        <p>{{ Str::title($user->username) }}</p>
                                    </td>
                                    <td>{{ Str::lower($user->email) }}</td>
                                    <td>
                                        <div class="btn-group">
                                                @if ($user->id === Auth::user()->id)
                                                <a href="{{ route('admin.profile.view') }}" class="btn btn-info">
                                                    <i class="fas fa-eye"></i> View Your Profile
                                                </a>
                                            @else
                                                <a href="{{ route('admin.staff.view', $user->username) }}" class="btn btn-info">
                                                    <i class="fas fa-eye"></i> View Profile
                                                </a>
                                            @endif

                                                @if ($user->id !== Auth::user()->id)
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin.staff.delete', $user->username) }}" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete Account
                                                </a>
                                            @else
                                                <span class="btn btn-danger disabled" aria-disabled="true">
                                                    <i class="fas fa-trash"></i> Cannot delete your own account
                                                </span>
                                            @endif


                                            @if ($user->super_access == '1')
                                            @if ($user->id !== Auth::user()->id)
                                            <a onclick="return confirm('Are you sure of this action?')"
                                                href="{{ route('admin.staff.denyAdmin', $user->username) }}"
                                                title="Deny Admin Access" class="btn btn-secondary">
                                                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i> Cancel
                                                Admin Access
                                            </a>
                                            @else
                                            <span class="btn btn-secondary disabled" aria-disabled="true">
                                                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i> Cannot
                                                change your own access
                                            </span>
                                            @endif
                                            @else
                                            @if ($user->id !== Auth::user()->id)
                                            <a onclick="return confirm('Are you sure of this action?')"
                                                href="{{ route('admin.staff.makeAdmin', $user->username) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-check-circle" aria-hidden="true"></i> Make Admin
                                            </a>
                                            @else
                                            <span class="btn btn-primary disabled" aria-disabled="true">
                                                <i class="fas fa-check-circle" aria-hidden="true"></i> Cannot change
                                                your own access
                                            </span>
                                            @endif
                                            @endif




                                            @if ($user->role === 'admin')
                                            @if ($user->id !== Auth::user()->id)
                                            <a onclick="return confirm('Are you sure of this action?')"
                                                href="{{ route('admin.staff.denyRole', $user->username) }}"
                                                class="btn btn-dark">
                                                <i class="fas fa-exclamation-circle" aria-hidden="true"></i> Cancel
                                                Staff Access
                                            </a>
                                            @else
                                            <span class="btn btn-dark disabled" aria-disabled="true">
                                                <i class="fas fa-exclamation-circle" aria-hidden="true"></i> Cannot
                                                change your own access
                                            </span>
                                            @endif
                                            @else
                                            @if ($user->id !== Auth::user()->id)
                                            <a onclick="return confirm('Are you sure of this action?')"
                                                href="{{ route('admin.staff.makeRole', $user->username) }}"
                                                class="btn btn-warning">
                                                <i class="fab fa-adn" aria-hidden="true"></i> Make Staff
                                            </a>
                                            @else
                                            <span class="btn btn-warning disabled" aria-disabled="true">
                                                <i class="fab fa-adn" aria-hidden="true"></i> Cannot change your own
                                                access
                                            </span>
                                            @endif
                                            @endif


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