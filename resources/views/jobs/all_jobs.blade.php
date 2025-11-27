@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>All Jobs</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/add_job') }}" class="btn btn-primary mb-3">Add New Job</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Last Date</th>
                <th>Added Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->last_date }}</td>
                <td>{{ $job->added_date }}</td>
                <td>{{ $job->updated_date }}</td>
                <td>
                    <a href="{{ url('/edit_job/'.$job->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ url('/delete_job/'.$job->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No jobs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
