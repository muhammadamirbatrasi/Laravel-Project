<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"> -->
    
    <!-- <link href="{{ asset('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet"> -->
    <!-- Page Specific CSS -->
    @yield('external_css')
</head>

<body>
    <div id="wrapper">
        @include('layouts.new_sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.new_header')
            @include('layouts.new_breadcrumbs')
            <div class="wrapper wrapper-content animated fadeInRight">
                @yield('content')
            </div>
            @include('layouts.new_footer')
        </div>
    </div>
</body>
<!-- Mainly scripts -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<script src="{{ asset('assets/js/inspinia.js') }}"></script>

<!-- Page Specific JS -->
    @yield('external_js')

<!-- 
    
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script> -->

<!-- Custom and plugin javascript -->
<!-- 
    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script> -->

<!-- iCheck -->
<!-- <script src="{{ asset('assets/js/plugins/iCheck/icheck.min.js') }}"></script> -->
</html>