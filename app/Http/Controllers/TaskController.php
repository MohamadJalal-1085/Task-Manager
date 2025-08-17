<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
   public function index(Request $request)
{
    $query = Task::query();

    if ($request->has('search')) {
        $query->where('task_name', 'LIKE', '%' . $request->search . '%');
    }

    $tasks = $query->get();

    return view('tasks.index', compact('tasks'));
}

    // Show form to create new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'completed' => false,
            'task_created_at' => now(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    // Show a single task (optional)
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show edit form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $task->update($request->only(['task_name', 'description', 'completed']));

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
