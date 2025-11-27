@extends('layouts.new_app')

@section('content')
<div class="container mt-4">
    <h2>Add New Photo</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Photo Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <input type="file" name="image_name" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Photo</button>
    </form>
</div>
@endsection
