@extends('tasks.layouts.app')

@section('content')
<div class="container mt-3 mb-3">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="status" name="status" required>
                <option value="not_start" {{ $task->status ==  'not_start' ? 'selected' : '' }}>Not Started</option>
                <option value="in_progress" {{ $task->status ==  'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="complete" {{ $task->status ==  'complete' ? 'selected' : '' }}>Completed</option>
            </select>
            <label for="status" class="form-label">Status</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $task->deadline ? $task->deadline->format('Y-m-d') : '' }}" required>
            <label for="deadline" class="form-label">Deadline</label>
            @error('deadline')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>
@endsection
