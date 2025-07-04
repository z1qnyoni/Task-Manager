@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <h2 class="mb-4 text-center">Edit Profile</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <!-- Profile Information -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Info</button>
    </form>

    <hr class="my-5">

    <!-- Password Update -->
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input id="current_password" type="password" class="form-control" name="current_password" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-warning">Change Password</button>
    </form>

    <hr class="my-5">

    <!-- Delete Account -->
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label for="delete_confirmation" class="form-label">Confirm Password to Delete Account</label>
            <input id="delete_confirmation" type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
