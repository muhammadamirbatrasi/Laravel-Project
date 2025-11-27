@extends('layouts.app') <!-- layouts.app include -->

@section('content')
<div class="container mt-5">
    <h2>Edit Job</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Job Form -->
    <form action="{{ url('/update_job/'.$job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $job->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}">
        </div>

        <div class="mb-3">
            <label for="last_date" class="form-label">Last Date</label>
            <input type="date" name="last_date" id="last_date" class="form-control" value="{{ $job->last_date }}">
        </div>

        <button type="submit" class="btn btn-success">Update Job</button>
        <a href="{{ url('/all_jobs') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
