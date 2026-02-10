<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = request()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'required|in:low,medium,high',
        'due_date' => 'nullable|date',
    ]);

    $request->user()->tasks()->create($validated);

    return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully!');
}

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/tasks')->with('success', 'Task updated!');
    }


    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::user()->id) {
            abort(403);
        }

        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted!');
    }

    public function toggle(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    $task->update([
        'completed' => ! $task->completed,
    ]);

    return redirect('/tasks')->with('success', 'Task status updated!');
}


} 


 
