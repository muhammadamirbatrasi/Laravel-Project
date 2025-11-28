@extends('layouts.auth')
@section('css')
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <h2>Register</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

        
        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{ route('login.form') }}">Login</a>
    </form>

</div>
@endsection