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
                                    <th style="width: 125px">Phone</th>
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
                                    <td>
                                        <p>{{ $user->phone ?? 'N/A' }}</p>
                                     </td>
                                    <td>{{ Str::lower($user->email) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.staff.view', $user->username) }}" class="btn btn-info"><i class="fas fa-eye"> View</i></a>

                                            <a onclick="return confirm('Are you sure')" href="{{ route('admin.staff.delete', $user->username) }}"
                                                class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
