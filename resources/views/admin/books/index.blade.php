@extends('admin.layouts.adminLayout')

@section('current_page', 'Book Management')
@section('title', 'Book Management')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto">

                <div class="table-responsive">
                    <a href="{{ route('admin.book.create') }}" class="btn btn-outline-info  w-25 mt-3 mb-3 ml-2">Add new
                        <i class="fas fa-plus"></i></a>
                    <div class="card-header mb-5">
                        <h3 class="card-title">Details of all available books</h3>
                    </div>
                    @if($books->count())
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 25px">s/n</th>
                                    <th style="width: 125px">Title</th>
                                    <th style="width: 125px">ISBN</th>
                                    <th style="width: 25px !important">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ Str::title($book->title) }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.book.show', $book) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.book.edit', ['book' => $book->slug]) }}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Are you sure ?')" href="{{ route('admin.book.destroy', ['book' => $book->slug]) }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    @else
                    <div class="alert alert-danger">No Book Available</div>
                    @endif
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


@endsection
