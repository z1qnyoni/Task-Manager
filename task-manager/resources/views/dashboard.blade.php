@extends('layouts.app')

@section('header')
    <h2 class="fs-4 fw-bold text-dark d-flex align-items-center">
        <i class="bi bi-person-check-fill me-2"></i> Welcome, {{ Auth::user()->name }}!
    </h2>
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body text-center">
            <h4 class="mb-3">Task Manager Dashboard</h4>
            <p class="text-muted">Use the navigation above to manage your tasks.</p>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                <i class="bi bi-list-task me-1"></i> Go to Tasks
            </a>
        </div>
    </div>
@endsection
