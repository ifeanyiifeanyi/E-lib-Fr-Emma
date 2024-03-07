@extends('admin.layouts.adminLayout')

@section('current_page', 'Acess Code Management')
@section('title', 'Access Code Management')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mx-auto">

                <div class="table-responsive">
                    <a href="{{ route('admin.activationCode.create') }}" class="btn btn-outline-info  w-25 mt-3 mb-3 ml-2">Add
                        <i class="fas fa-plus"></i></a>
                    <div class="card-header mb-5">
                        <h3 class="card-title">Details of all available Activation Codes</h3>
                    </div>
                    {{-- @if($books->count()) --}}
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 25px">s/n</th>
                                    <th style="width: 125px">Code</th>
                                    <th style="width: 125px">Serial</th>
                                    <th style="width: 125px">status</th>
                                    <th style="width: 25px !important">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($codes as $code)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <code onclick="copyToClipboard('{{ $code->code }}')">
                                                <i class="fas fa-copy text-info" title="Click to Copy"></i>   {{$code->code }}                                            
                                            </co>
                                        </td>
                                        <td>{{ $code->serial_code }}</td>
                                        <td>
                                            @if($code->status === 'activated')
                                            <span class="alert alert-success">Active</span>
                                            @else
                                            <span class="alert alert-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.activationCode.details', ['code' => $code->serial_code]) }}" class="btn btn-info"><i class="fas fa-eye"> View</i></a>

                                                @if($code->activations->isNotEmpty())
                                                    <span class="btn btn-success"><i class="fas fa-check"></i> Activated</span>
                                                @else
                                                <a onclick="return confirm('Are you sure')" href="{{ route('admin.activationCode.delete', ['code' => $code->serial_code]) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <p class="alert alert-danger text-center">Not Available</p>
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
