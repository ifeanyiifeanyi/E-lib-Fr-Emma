@extends('admin.layouts.adminLayout')

@section('current_page', 'Categories')
@section('title', 'Manage Categories')

@section('css')


@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary">
                    <!-- edit form  -->
                    @if(isset($category))
                    <form id="quickForm" method="POST" action="{{ route('admin.category.update', $category) }}">
                        <div>
                            <h3 class="text-center m-2">Edit category</h3>

                        </div>
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" name="category" class="form-control" id="category"
                                    placeholder="Enter category name"
                                    value="{{ old('category', $category->category) }}">
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description"
                                    placeholder="Category Description">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                    @else
                    <!-- create form -->
                    <form id="quickForm" method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" name="category" class="form-control" id="category"
                                    placeholder="Enter category name" value="{{ old('category') }}">
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description"
                                    placeholder="Category Description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endif




                </div>

            </div>
            <div class="col-md-8">
                @if($categories->count())
                <div class="card table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>s/n</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::title($category->category) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure')"
                                        href="{{ route('admin.category.delete', $category) }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <p class="alert alert-danger">Not available</p>
                @endif
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection


@section('js')


@endsection