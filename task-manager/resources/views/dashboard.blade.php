@extends('layouts.app')

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fs-4 fw-bold d-flex align-items-center dashboard-title">
    <i class="bi bi-speedometer2 me-2 text-primary"></i> Dashboard
        </h2>
        <div class="d-flex align-items-center">
            <span class="text-muted me-3">Welcome, {{ Auth::user()->name }}!</span>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> New Task
            </a>
        </div>
    </div>
@endsection

@section('content')
    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 text-warning mb-2">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="display-4 fw-bold text-warning mb-1">{{ $stats['new'] ?? 0 }}</div>
                    <h6 class="text-muted mb-0">New Tasks</h6>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 text-info mb-2">
                        <i class="bi bi-arrow-clockwise"></i>
                    </div>
                    <div class="display-4 fw-bold text-info mb-1">{{ $stats['in_progress'] ?? 0 }}</div>
                    <h6 class="text-muted mb-0">In Progress</h6>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 text-success mb-2">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="display-4 fw-bold text-success mb-1">{{ $stats['completed'] ?? 0 }}</div>
                    <h6 class="text-muted mb-0">Completed</h6>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 text-primary mb-2">
                        <i class="bi bi-list-task"></i>
                    </div>
                    <div class="display-4 fw-bold text-primary mb-1">{{ $stats['total'] ?? 0 }}</div>
                    <h6 class="text-muted mb-0">Total Tasks</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Overview -->
    <div class="row g-4 mb-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up me-2 text-primary"></i>Progress Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Completion Rate</span>
                            <span class="fw-bold">{{ $stats['completion_rate'] ?? 0 }}%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: {{ $stats['completion_rate'] ?? 0 }}%"></div>
                        </div>
                    </div>
                    
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="text-warning fw-bold">{{ $stats['new'] ?? 0 }}</div>
                            <small class="text-muted">New</small>
                        </div>
                        <div class="col-4">
                            <div class="text-info fw-bold">{{ $stats['in_progress'] ?? 0 }}</div>
                            <small class="text-muted">In Progress</small>
                        </div>
                        <div class="col-4">
                            <div class="text-success fw-bold">{{ $stats['completed'] ?? 0 }}</div>
                            <small class="text-muted">Completed</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h6 class="mb-3 text-muted">Quick Actions</h6>
                    <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary mb-2 w-100">
                        <i class="bi bi-plus-circle me-1"></i> Create Task
                    </a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-list-task me-1"></i> View All Tasks
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
