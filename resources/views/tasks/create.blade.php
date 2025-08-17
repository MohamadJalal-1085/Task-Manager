@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add New Task</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="task_name" class="form-label">Task Name:</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional):</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection