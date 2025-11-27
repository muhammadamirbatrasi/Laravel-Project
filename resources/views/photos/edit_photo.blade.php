@extends('layouts.new_app')

@section('content')
<div class="container mt-4">
    <h2>Edit Photo</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Photo Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $photo->title }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Image (Optional)</label>
            <input type="file" name="image_name" id="image" class="form-control">
            <small>Current: <img src="{{ asset('images/'.$photo->image_name) }}" width="80"></small>
        </div>
        <div class="mb-3">
            <label for="job" class="form-label">Select job</label>
            <select name="job_id" id="job_id" class="form-select" required>
                <option value="">Select Job title</option>
                @foreach($jobs as $job)
                <option value="{{ $job->id }}" {{ $photo->job_id == $job->id ? 'selected' : '' }}>
                    {{ $job->title }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Photo</button>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection