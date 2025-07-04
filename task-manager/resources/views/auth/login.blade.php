@extends('layouts.guest')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('register') }}">No account?</a>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
@endsection
