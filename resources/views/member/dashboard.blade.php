@extends('member.layouts.memberLayout')

@section('title', 'Dashboard')
@section('css')

@endsection


@section('member')

@if (auth()->user()->pass_code > 0)
<div class="container mt-5 ">
    <div class="row row-cols-1 row-cols-md-4 row-cols-xl-4 row-cols-xxl-4 pt-5">
        <div class="col">
            <div class="card radius-10 bg-gradient-cosmic">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Latest Books</p>
                            <h4 class="my-1 text-white">4805</h4>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total Hours Read</p>
                            <h4 class="my-1 text-white">84,245 Hrs</h4>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Reviews</p>
                            <h4 class="my-1 text-white">89</h4>
                        </div>
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-kyoto">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-dark">Book Categories</p>
                            <h4 class="my-1 text-dark">107</h4>
                        </div>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="mb-4 text-center">
        <div class="d-flex flex-wrap">
            @foreach ($categories as $category)
            <a href="{{ route('book.by.category', $category->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill mr-3 mb-2">
                {{ $category->category }}
            </a>
            @endforeach

            @foreach ($genres as $genre)
            <a href="{{ route('book.by.genre', $genre->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill mr-2 mb-2">
                {{ $genre->genre }}
            </a>
            @endforeach

            @foreach ($tags as $tag)
            <a href="{{ route('book.by.tag', $tag->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill mr-2 mb-2">
                {{ $tag->tag }}
            </a>
            @endforeach
        </div>
    </div>

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
<div class="d-flex justify-content-center pb-5 mb-5">
    {{ $books->links() }}
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