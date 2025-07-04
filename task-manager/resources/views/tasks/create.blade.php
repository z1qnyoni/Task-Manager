@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required value="{{ old('deadline') }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="jauns" {{ old('status') == 'jauns' ? 'selected' : '' }}>New</option>
                <option value="procesā" {{ old('status') == 'procesā' ? 'selected' : '' }}>In Progress</option>
                <option value="pabeigts" {{ old('status') == 'pabeigts' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection
