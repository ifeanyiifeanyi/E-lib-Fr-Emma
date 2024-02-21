@extends('admin.layouts.adminLayout')

@section('current_page', 'Manage Book Genre')
@section('title', 'Manage Book Genre')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
            <form id="quickForm" method="POST" action="{{route('admin.genre.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="genre">Add Genre</label>
                        <input type="text" name="genre" class="form-control" id="genre"
                            placeholder="Enter New genre" value="{{ old('genre') }}">
                        @error('genre')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Genre Description</label>
                        <textarea name="description" class="form-control" id="description"
                            placeholder="Genre Description" value="{{ old('description') }}"></textarea>
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
        </div>
        </div>
        <div class="col-md-8">
            @if($genres->count())
            <div class="card table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>s/n</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::title($genre->genre) }}</td>
                        <td>
                            <div class="btn-group">
                                <a onclick="return confirm('Are you sure')"
                                    href="{{ route("admin.genre.delete", $genre) }}" class="btn btn-danger"><i
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
