<!DOCTYPE html>
<html>

<head>
    <title>Auth</title>

    <!-- Include shared CSS -->
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>

    <div class="auth-container">
        @yield('content')
    </div>

    <!-- Shared JS -->
    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <!-- 
    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script> -->


    @yield('js')

</body>

</html>