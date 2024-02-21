@extends('admin.layouts.adminLayout')

@section('current_page', 'Manage Book Tags')
@section('title', 'Manage Book Tags')

@section('css')


@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
            <form id="quickForm" method="POST" action="{{route('admin.tag.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="tag">Add Tag</label>
                        <input type="text" name="tag" class="form-control" id="tag"
                            placeholder="Enter New Tag" value="{{ old('tag') }}">
                        @error('tag')
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
            @if($tags->count())
            <div class="card table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>s/n</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::title($tag->tag) }}</td>
                        <td>
                            <div class="btn-group">
                                <a onclick="return confirm('Are you sure')"
                                    href="{{ route("admin.tag.delete", $tag) }}" class="btn btn-danger"><i
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
