@extends('admin.layouts.adminLayout')

@section('current_page', 'Activation Page')
@section('title', 'Activation Page')

@section('css')
<style>
    .copy-confirm {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);

        padding: 10px 15px;

        background: #4BB543;
        color: #fff;
        border-radius: 5px;

        box-shadow: 0 3px 5px rgb(0 0 0 / 10%);
    }
</style>

@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid w-50" src="{{ asset($user->photo) }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Str::title($user->name) }}</h3>

                        <p class="text-muted text-center"><b>Role: </b> {{ Str::title($user->role) }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right">{{ $user->username }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number</b> <a class="float-right">{{ $user->phone ?? 'N/A' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Activation Code</b> <a class="float-right"><code>{{ $user->pass_code ?? 'N/A' }}</code></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>s/n</th>
                                <th>Code</th>
                                <th>Serial No.</th>
                            </tr>

                            @forelse ($codes as $code)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                <code class="copy-code" onclick="copyToClipboard('{{ $code->code }}')">
                                 <i class="fas fa-copy text-info" title="Click to Copy"></i>   {{ $code->code }}
                                </code>
                            </td>
                                <td><var>{{ $code->serial_code }} (<small class="text-info">{{ $code->status }}</small>)</var></td>
                            </tr>
                            @empty
                            <div class="alert akert-danger">Not Available!</div>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link text-center" href="#settings" data-toggle="tab">Submit code to activate Book Selection for user</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.members.StoreMangedCode') }}">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="inputCode" class="col-form-label">Submit Activation Code</label>
                                    <div class="">
                                        <input
                                        {{ !empty($user->pass_code) ? 'disabled' : '' }}
                                        type="text" name="code" class="form-control" id="inputCode"
                                            placeholder="Activation Code" value="{{ old('code') }}">
                                        @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">

                                        <button
                                        {{ !empty($user->pass_code) ? 'disabled' : '' }}
                                        type="submit" class="btn btn-info btn-block w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
@endsection


@section('js')
<script>
    function copyToClipboard(text) {

            // Copy text
            navigator.clipboard.writeText(text);

            // Show confirmation
            let copyConfirm = document.createElement('div');
            copyConfirm.textContent = 'Copied!';
            copyConfirm.classList.add('copy-confirm');
            document.body.appendChild(copyConfirm);

            // Hide after 1.5 secs
            setTimeout(() => {
                copyConfirm.remove();
            }, 1500);

        }
</script>

@endsection
