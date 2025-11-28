@extends('layouts.auth')
@section('css')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <h2>Login</h2>
     @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

        <a href="#"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{ route('register.form') }}">Create an account</a>
    </form>

</div>
@endsection