@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Search Form --}}
        <form action="{{ route('tasks.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by task name..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ New Task</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($tasks as $task)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->task_name }}</h5>
                        <p class="card-text text-muted">{{ $task->description }}</p>

                        @if($task->completed)
                            <span class="badge bg-success mb-2">Completed</span>
                        @else
                            <span class="badge bg-warning text-dark mb-2">Pending</span>
                        @endif

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-info me-2">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this task?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="card card-body text-center">
                    <p class="mb-0">No tasks found. Create one!</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection