@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-check2-square me-2"></i>Welcome, {{ Auth::user()->name }}!</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Create New Task
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-4"><i class="bi bi-list-task me-2"></i>Your Tasks</h4>

            @if ($tasks->count())
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->deadline }}</td>
                                <td>
                                    <span class="badge rounded-pill 
                                        {{ $task->status === 'jauns' ? 'bg-warning text-dark' : ($task->status === 'procesā' ? 'bg-info text-dark' : 'bg-success') }}">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">You don't have any tasks yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
