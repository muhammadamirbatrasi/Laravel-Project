@extends('layouts.app') <!-- if you are using layouts -->

@section('content')
<div class="container mt-5">
    <h2>Add New Job</h2>

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

    <!-- Add Job Form -->
    <form action="{{ url('/add_job') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label for="last_date" class="form-label">Last Date</label>
            <input type="date" name="last_date" id="last_date" class="form-control" value="{{ old('last_date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
</div>
@endsection
