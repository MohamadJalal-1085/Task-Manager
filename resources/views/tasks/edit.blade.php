@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Task</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="task_name" class="form-label">Task Name:</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" value="{{ old('task_name', $task->task_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional):</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="completed" value="0">
                    <input type="checkbox" name="completed" id="completed" class="form-check-input" value="1" {{ old('completed', $task->completed) ? 'checked' : '' }}>
                    <label for="completed" class="form-check-label">Mark as Completed</label>
                </div>

                <button type="submit" class="btn btn-primary">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection