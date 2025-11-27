<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">My Laravel App</a>
        <div>
            <a href="{{ route('photos.index') }}" class="btn btn-sm btn-primary">All Photos</a>
            <a href="{{ route('photos.create') }}" class="btn btn-sm btn-success">Add Photo</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
