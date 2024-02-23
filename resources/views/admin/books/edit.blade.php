@extends('admin.layouts.adminLayout')

@section('current_page', 'Edit Book')
@section('title', 'Edit | '.$book->title)

@section('css')

<style>
    .is-invalid {
        color: crimson !important;
        font-weight: bold !important;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route("admin.book.update", $book) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('title') inputError @enderror">
                                            @error('title') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Title
                                        </label>
                                        <input name="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="@error('title') inputError @enderror" placeholder="Enter Book Title"
                                            value="{{ old('title', $book->title) }}">
                                        @error('title')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('author') inputError @enderror">
                                            @error('author') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Author
                                        </label>
                                        <input name="author" type="text"
                                            class="form-control @error('author') is-invalid @enderror"
                                            id="@error('author') inputError @enderror" placeholder="Enter Book Author"
                                            value="{{ old('author', $book->author) }}">
                                        @error('author')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('publisher') inputError @enderror">
                                            @error('publisher') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Publisher
                                        </label>
                                        <input name="publisher" type="text"
                                            class="form-control @error('publisher') is-invalid @enderror"
                                            id="@error('publisher') inputError @enderror"
                                            placeholder="Enter Book Publisher"
                                            value="{{ old('publisher', $book->publisher) }}">
                                        @error('title')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('language') inputError @enderror">
                                            @error('language') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Language
                                        </label>
                                        <input name="language" type="text"
                                            class="form-control @error('language') is-invalid @enderror"
                                            id="@error('language') inputError @enderror"
                                            placeholder="Enter Book Language"
                                            value="{{ old('language', $book->language) }}">
                                        @error('language')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('isbn') inputError @enderror">
                                            @error('isbn') <i class="text-danger far fa-times-circle"></i>@enderror
                                            isbn
                                        </label>
                                        <input name="isbn" type="text"
                                            class="form-control @error('isbn') is-invalid @enderror"
                                            id="@error('isbn') inputError @enderror"
                                            placeholder="Enter Book isbn number" value="{{ old('isbn', $book->isbn) }}">
                                        @error('isbn')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('total_pages') inputError @enderror">
                                            @error('total_pages') <i
                                                class="text-danger far fa-times-circle"></i>@enderror
                                            Total Number Of Pages
                                        </label>
                                        <input name="total_pages" type="text"
                                            class="form-control @error('total_pages') is-invalid @enderror"
                                            id="@error('total_pages') inputError @enderror"
                                            placeholder="Enter Total Number of Pages"
                                            value="{{ old('total_pages', $book->total_pages) }}">
                                        @error('total_pages')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('category_id') inputError @enderror">
                                            @error('category_id') <i
                                                class="text-danger far fa-times-circle"></i>@enderror
                                            Select Book Category
                                        </label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" id="@error('category_id') inputError @enderror">

                                            @if($categories->count())
                                            @foreach ($categories as $category)
                                            <option {{ $category->id == $book->category_id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ Str::title($category->category) }}
                                            </option>
                                            @endforeach
                                            @else
                                            <option value="" disabled>Not Available</option>
                                            @endif
                                        </select>


                                        @error('category_id')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('genre_id') inputError @enderror">
                                            @error('genre_id') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Select Book Genre
                                        </label>
                                        <select class="form-control @error('genre_id') is-invalid @enderror"
                                            name="genre_id" id="@error('genre_id') inputError @enderror">
                                            @if($genres->count())
                                            @foreach ($genres as $genre)
                                            <option {{ $genre->id == $book->genre_id ? 'selected' : '' }} value="{{
                                                $genre->id }}">{{ Str::title($genre->genre) }}</option>
                                            @endforeach
                                            @else
                                            <option value="" disabled>Not Available</option>
                                            @endif
                                        </select>


                                        @error('genre_id')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label"
                                            for="@error('publication_date') inputError @enderror">
                                            @error('publication_date') <i
                                                class="text-danger far fa-times-circle"></i>@enderror
                                            Publication Date
                                        </label>
                                        <input name="publication_date" type="date"
                                            class="form-control @error('publication_date') is-invalid @enderror"
                                            id="@error('publication_date') inputError @enderror"
                                            placeholder="Publication date"
                                            value="{{ old('publication_date', $book->publication_date) }}">
                                        @error('publication_date')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Book Tags <small class="text-info">(minimum 2)</small></label>
                                        <select name="tag_id[]"
                                            class="select2 form-control @error('tag_id') is-invalid @enderror"
                                            multiple="multiple" data-placeholder="Select book tags"
                                            style="width: 100%;">
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $bookTags->contains('id', $tag->id) ?
                                                'selected' : '' }}>
                                                {{ Str::title($tag->tag) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tag_id')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('file_format') inputError @enderror">
                                            @error('file_format') <i
                                                class="text-danger far fa-times-circle"></i>@enderror
                                            File Type
                                        </label>
                                        <input name="file_format" type="text"
                                            class="form-control @error('file_format') is-invalid @enderror"
                                            id="@error('file_format') inputError @enderror" placeholder="File Format"
                                            value="{{ old('file_format', $book->file_format) }}">
                                        @error('file_format')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>





                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('file_url') inputError @enderror">
                                            @error('file_url') <i class="text-danger far fa-times-circle"></i>@enderror
                                            File URL
                                        </label>
                                        <input name="file_url" type="url"
                                            class="form-control @error('file_url') is-invalid @enderror"
                                            id="@error('file_url') inputError @enderror" placeholder="File Format"
                                            value="{{ old('file_url', $book->file_url) }}">
                                        @error('file_url')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mx-auto">
                                    <label class="col-form-label" for="@error('file_url') inputError @enderror">
                                        @error('file_url') <i class="text-danger far fa-times-circle"></i>@enderror
                                        Current File
                                    </label>
                                    <p> <a target="_blank" href="{{ $book->file_url }}"
                                            class="btn btn-outline-info btn-bg">View current file</a></p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="@error('thumbnail') inputError @enderror">
                                            @error('thumbnail') <i class="text-danger far fa-times-circle"></i>@enderror
                                            Book Thumbnail
                                        </label>
                                        <input onchange="previewImage(this)" name="thumbnail" type="file"
                                            class="form-control @error('thumbnail') is-invalid @enderror"
                                            id="@error('thumbnail') inputError @enderror" placeholder="File Format"
                                            value="{{ old('thumbnail') }}" value="{{ old('thumbnail') }}">
                                        @error('thumbnail')
                                        <span class="is-invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mx-auto">
                                    <img src="{{ asset($book->thumbnail) }}" alt=""
                                        class="thumbnail-preview img-fluid img-responsive w-25">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label" for="@error('description') inputError @enderror">
                                        @error('thumbnail') <i class="text-danger far fa-times-circle"></i>@enderror
                                        Book Description
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        name="description" id="summernote" cols="30" rows="10"
                                        value="{{ old('description') }}">{!! $book->description ?? '' !!}</textarea>
                                    @error('description')
                                    <span class="is-invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Select Status <small class="text-info italic">Current Status: ({{ ($book->status == 'active') ? 'Active' : 'Draft' }})</small></label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="" disabled selected>Select Book Status</option>
                                            <option value="draft">Draft</option>
                                            <option value="active">Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Now</button>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

            </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection


@section('js')
<script>
    function previewImage(input) {
        var preview = document.querySelector('.thumbnail-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('no_image.jpg') }}";
        }
    }
</script>


@endsection
