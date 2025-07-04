@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center">
        <h1 class="display-4 mb-4">Welcome to Task Manager</h1>
        <p class="lead mb-5">Create, manage and keep track of your tasks easily.</p>

        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Register</a>
        @endauth
    </div>
</div>
@endsection