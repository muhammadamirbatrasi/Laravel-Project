@extends('layouts.new_app')

@section('content')
<div class="container mt-4">
    <h2>{{ $photo->title }}</h2>
    <img src="{{ asset('images/'.$photo->image_name) }}" alt="{{ $photo->title }}" class="img-fluid">
    <br><br>
    <a href="{{ route('photos.index') }}" class="btn btn-secondary">Back to All Photos</a>
</div>
@endsection
