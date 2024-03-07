@extends('member.layouts.memberLayout')

@section('title', 'Dashboard')
@section('css')

@endsection
@section('member')
<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Book Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Book Details</li>
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 border-end">
                <img src="{{ asset($book->thumbnail) }}" class="img-fluid" alt="book cover">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">{!! Str::title($book->title) !!}</h4>
                    <div class="mb-3">
                        <span class="price h4">{{ Str::title($book->author) }}</span>
                        <span class="text-muted">, Author</span>
                    </div>
                    <p class="card-text fs-6">{{ $book->description }}</p>
                    <dl class="row">
                        <dt class="col-sm-3">Publisher</dt>
                        <dd class="col-sm-9">{{ Str::title($book->publisher) }}</dd>

                        <dt class="col-sm-3">Date of Publication</dt>
                        <dd class="col-sm-9">{{ $book->publication_date }}</dd>

                        <dt class="col-sm-3">Book Type</dt>
                        <dd class="col-sm-9">{{ Str::upper($book->file_format) }} </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Language</dt>
                        <dd class="col-sm-9">{{ Str::title($book->language) }}</dd>

                        <dt class="col-sm-3">ISBN</dt>
                        <dd class="col-sm-9">{{ $book->isbn }}</dd>

                        <dt class="col-sm-3">Number of pages</dt>
                        <dd class="col-sm-9">{{ $book->total_pages}} </dd>
                    </dl>
                    <hr>
                    <div class="d-flex gap-3 mt-3">
                        <a target="_blank" href="{{ route('book.file', $book->slug) }}" class="btn btn-primary">Read now</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>


    <h6 class="text-uppercase mb-0">Related Product</h6>
    <hr />
    <div class="row row-cols-1 row-cols-lg-6">
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">{{ $book->category->category }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">{{ $book->genre->genre }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @forelse ($bookTags as $bkts)
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-10">
                        <div class="card-body">
                            <h6 class="card-title text-center">{{ $bkts->tag }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
    </div>


</div>
<!--end page wrapper -->
@endsection

@section('js')

@endsection