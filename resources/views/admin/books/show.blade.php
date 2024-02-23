@extends('admin.layouts.adminLayout')

@section('current_page', 'Book Details')
@section('title', $book->title)

@section('css')


@endsection

@section('content')
<div class="content">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>


            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Category</span>

                                        <span class="info-box-number text-center text-muted mb-0">{{ Str::title($book->category->category) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Genre</span>

                                        <span class="info-box-number text-center text-muted mb-0">{{ $book->genre->genre }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Language</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $book->language }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Number of pages</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $book->total_pages }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">ISBN</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $book->isbn }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Number of views</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $book->views ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>{{ Str::title($book->title) }}</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="https://placehold.co/600x400?text={{ $book->author }}"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">{{ Str::title($book->author) }}</a>
                                        </span>
                                        <span class="description">Author</span>
                                    </div>
                                    <!-- /.user-block -->
                                    {!! $book->description !!}
                                    <p>
                                        <i class="fas fa-link mr-1"></i> Publisher
                                        <a href="#" class="link-black text-sm"> {{ Str::title($book->publisher) }}</a>
                                    </p>
                                    <p>
                                        <i class="far fa-plus-square mr-1"></i>
                                        Publication Date:
                                        <a href="#" class="link-black text-sm">{{ \Carbon\Carbon::parse($book->publication_date)->format('jS F, Y') }} </a>
                                    </p>
                                    <p>
                                        <i class="far fa-file-pdf mr-1"></i>
                                        Book Format:
                                        <a href="#" class="link-black text-sm">{{ $book->file_format }} </a>
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-muted">
                            <img src="{{ asset($book->thumbnail) }}" class="w-100 img-responsive" alt="Thumbnail">
                        </div>

                        <h5 class="mt-5 text-muted">Book files</h5>
                        <ul class="list-unstyled">

                            <li>
                                <a target="_blank" href="{{ url($book->file_url) }}" class="btn-link text-secondary"><i
                                        class="far fa-fw fa-file-pdf"></i>{{ $book->file_url }}</a>
                            </li>
                        </ul>
                        {{-- <div class="text-center mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                        </div> --}}
                    </div>
                </div>

                <div class="container">
                    <h2>Book Tags</h2>
                <div class="row">
                    @forelse($bookTags as $tag)
                    <div class="col-12 col-sm-3">
                        <div class="info-box bg-info shadow">
                            <div class="info-box-content">
                                <span class="info-box-number text-center mb-0">{{ Str::title($tag->tag) }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="alert alert-danger">No tags attached</p>
                    @endforelse

                </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection


@section('js')


@endsection
