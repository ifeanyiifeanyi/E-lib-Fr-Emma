@extends('admin.layouts.adminLayout')

@section('current_page', 'Generate new code')
@section('title', 'New Code')

@section('css')


@endsection
@php
      use Ramsey\Uuid\Uuid;

// Function to generate a unique activation code
function generateActivationCode($length = 10) {
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= mt_rand(0, 9); // Generate random number from 0 to 9
    }
    return $code;
}

// Function to generate a unique serial number
function generateSerialNumber($length = 15) {
    $uuid = Uuid::uuid4();
    $serial = substr(preg_replace('/[^0-9a-f]/', '', $uuid->toString()), 0, $length);
    return $serial;
}

// Generate activation code and serial number
$activationCode = generateActivationCode();
$serialNumber = generateSerialNumber();

@endphp
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card shadow p-2">

                    <p>
                        <b>Activation Code: </b> {{ $activationCode }}
                    </p>
                    <p>
                        <b>Serial Code Number: </b> {{ $serialNumber }}
                    </p>

                    <form action="{{ route('admin.activationCode.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="code" value="{{ $activationCode }}">
                        <input type="hidden" name="serial_code" value="{{ $serialNumber }}">

                        <button type="submit" class="btn btn-info"><i class="fas fa-memory"></i> Save Codes</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection



@section('js')


@endsection
