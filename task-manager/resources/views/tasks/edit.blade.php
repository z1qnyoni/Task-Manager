@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input id="deadline" type="date" name="deadline" class="form-control" value="{{ old('deadline', $task->deadline) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="jauns" {{ $task->status == 'jauns' ? 'selected' : '' }}>Jauns</option>
                <option value="procesā" {{ $task->status == 'procesā' ? 'selected' : '' }}>Procesā</option>
                <option value="Pabeigts" {{ $task->status == 'Pabeigts' ? 'selected' : '' }}>Pabeigts</option>
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </div>
    </form>
</div>
@endsection
