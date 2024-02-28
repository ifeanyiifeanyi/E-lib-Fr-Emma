@extends('admin.layouts.adminLayout')

@section('current_page', 'Access Code Details')
@section('title', 'Access Code Details')

@section('css')
<style>


 .height-100{
     height:100vh;
 }

 .card{
     border:none;
     width:400px;
     border-radius:12px;
     color:#fff;
     background-image: linear-gradient(to right top, #280537, #56034c, #890058, #bc005b, #eb1254);
 }

.number span{

    font-size:20px;
    font-weight:600;
}

 .cardholder , .expires{
     font-weight:600;
     font-size:17px;
 }

 .name,.date{

     font-size:15px;

 }

 .card-border{

     border-top-left-radius:30px !important;
     border-top-right-radius:30px !important;

     border-bottom-left-radius:30px !important;
     border-bottom-right-radius:30px !important;

     border:none;
     border-radius:6px;
     background-color:blue;
     color:#fff;
     background-image: linear-gradient(to right top, #0c0537, #440b51, #7f005d, #b9005b, #eb124b);
 }
</style>

@endsection
@php
  use Carbon\Carbon;
@endphp

@section('content')
<div class="content">
    <div class="container-fluid p-3 my-3">
        <div class="height-100 d-flex justify-content-center align-items-center">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="{{ asset('no_image.jpg') }}" class="img-circle img-thumbnail img-preview" width="50" />
                    <h5>{{ config('app.name') }}</h5>
                </div>
                <div class="px-2 number mt-3 text-center">
                 <span><code style="letter-spacing: 25px; ">{{ $code->code }}</code></span>
                </div>
                <div class="p-4 card-border mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="cardholder">Card Holder</span>

                        @if (!$user)
                        <span class="expires">Unassigned</span>

                        @else
                        <span class="expires">{{ Str::title($user->name) ?? 'Unassigned' }}</span>

                        @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="name">Issued Date</span>

                        @if (!$activatedCode)
                        <span class="date"> Unassigned</span>
                        @else
                        <span class="date">{{ Carbon::parse($activatedCode->activated_at)->format('m/y') ?? 'Unassigned' }} </span>
                        @endif

                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="name">Expiration Date</span>


                        @if (!$activatedCode)
                        <span class="date">Unassigned</span>

                        @else
                        <span class="date">{{ Carbon::parse($activatedCode->expires_at)->format('m/y') ?? 'Unassigned' }}</span>

                        @endif
                    </div>

                </div>
                <span class="mt-2">
                    <var style="letter-spacing: 2px;display:flex;justify-content:center;align-items:center; flex-direction:column">{{ $code->serial_code }} <br> <small style="letter-spacing: 2px" class="text-muted">serial Number</small></var>
                </span>
            </div>



        </div>
    </div>
</div>
@endsection


@section('js')


@endsection
