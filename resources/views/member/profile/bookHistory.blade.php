@extends('member.layouts.memberLayout')

@section('title', 'Dashboard')
@section('css')

@endsection


@section('member')

@if ($books->count())
<div class="container mt-5">
    <!--end row-->
    <div class="pt-5 mb-5 text-center row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        @forelse ($books as $book)
        <div class="col">
            <div class="card radius-15 h-100">
                <div class="text-center card-body">
                    <div class="p-4 radius-15">
                        <img src="{{ asset($book->book->thumbnail) }}" width="110" height="110"
                            class="p-1 bg-white shadow rounded-circle" alt="">
                        <h5 class="mt-5 mb-0 text-dark">{{ Str::title($book->book->title) }}</h5>
                        <p class="mb-3 text-dark">{{ Str::title($book->author) }}</p>

                        <div class="d-grid"> <a href="{{ route('member.bookDetails.view', $book->book->slug) }}"
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
    <div class="py-2 border-0 alert alert-info bg-info alert-dismissible fade show">
        <div class="d-flex align-items-center ">
            <div class="text-white font-35"><i class="bx bxs-message-square-x"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Warning</h6>
                <div class="text-white">You have not read any book so far</b></div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@endsection

@section('js')

@endsection