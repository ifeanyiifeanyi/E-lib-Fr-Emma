@extends('member.layouts.memberLayout')

@section('title', 'Dashboard')
@section('css')

@endsection


@section('member')

<div class="container mt-5 ">
    <h1 class="text-center p-3">Search results for <b class="text-info">{{ $query }}</b></h1>
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


@endsection

@section('js')

@endsection