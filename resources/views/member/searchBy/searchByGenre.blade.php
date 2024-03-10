@extends('member.layouts.memberLayout')

@section('title', $genre->genre)
@section('css')

@endsection


@section('member')

@if (auth()->user()->pass_code > 0)
<div class="container mt-5 ">
    <h4 class="text-center p-5">Genre: <b class="text-muted"><q>{{ Str::title($genre->genre) }}</q></b></h4>
    <div class="pt-5 text-center row row-cols-1 row-cols-lg-2 row-cols-xl-4 mb-5">
        @forelse ($books as $book)
        <div class="col">
            <div class="card radius-15 h-100">
                <div class="text-center card-body">
                    <div class="p-4 radius-15">
                        <img src="{{ asset($book->thumbnail) }}" width="110" height="110"
                            class="p-1 bg-white shadow rounded-circle" alt="">
                        <h5 class="mt-5 mb-0 text-dark">{{ Str::title($book->title) }}</h5>
                        <p class="mb-3 text-dark">{{ Str::title($book->author) }}</p>

                        <div class="d-grid"> <a href="{{ route('member.bookDetails.view', $book->slug) }}"
                                class="btn btn-info radius-15">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="mx-auto col-md-7">
            <p class="text-center alert alert-danger">Not available</p>
        </div>
        @endforelse

    </div>
</div>
@else
<div class="container pt-5">
    <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
        <div class="d-flex align-items-center ">
            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Warning</h6>
                <div class="text-white">Please Submit your <b>Activation code to as access library materials</b></div>
                <div class="mt-3">
                    <a href="{{ route('member.submit.submitAccessCode') }}" class="btn btn-light">Submit access code
                        ..</a>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@endsection

@section('js')

@endsection