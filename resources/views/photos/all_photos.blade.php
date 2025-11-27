@extends('layouts.new_app')

@section('content')
<div class="container mt-4">
    <h2>All Photos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('photos.create') }}" class="btn btn-success mb-3">Add New Photo</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td>{{ $photo->title }}</td>
                    <td>
                        <img src="{{ asset('images/'.$photo->image_name) }}" alt="{{ $photo->title }}" width="80">
                    </td>
                    <td>
                        <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No photos found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
