@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Welcome, Admin!</h1>
    <p>Please choose how you want to access the PWD Portal.</p>

    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
    <a href="{{ route('password.request') }}" class="btn btn-forgot">Forgot Password?</a>
</div>
@endsection
