@extends('tasks.layouts.app')

@section('content')
<div class="container mt-3 mb-3">
    <h1>Add New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="status" name="status" required>
                <option value="not_start" {{ old('status') == 'not_start' ? 'selected' : '' }}>Not Started</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="complete" {{ old('status') == 'complete' ? 'selected' : '' }}>Completed</option>
            </select>
            <label for="status" class="form-label">Status</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }}" required>
            <label for="deadline" class="form-label">Deadline</label>
            @error('deadline')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Task</button>
    </form>
</div>
@endsection