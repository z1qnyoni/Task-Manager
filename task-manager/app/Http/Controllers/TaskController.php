<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    // Display a list of the user's tasks
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in the database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'deadline' => 'required|date',
        'status' => 'required|in:jauns,procesā,pabeigts',
    ]);

    // Convert to correct format
    $deadline = Carbon::parse($request->deadline)->format('Y-m-d');

    Task::create([
        'title' => $request->title,
        'deadline' => $deadline,
        'status' => $request->status,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}
    // Show the form for editing the specified task
    public function edit(Task $task)
    {
        $this->authorize('update', $task); // Ensure user owns the task
        return view('tasks.edit', compact('task'));
    }

    // Update the specified task in the database
public function update(Request $request, Task $task)
{
    $this->authorize('update', $task);

    $request->validate([
        'title' => 'required|string|max:255',
        'deadline' => 'required|date_format:d/m/Y',
        'status' => 'required|in:jauns,procesā,pabeigts',
    ]);

    
    $formattedDeadline = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');

    $task->update([
        'title' => $request->title,
        'deadline' => $formattedDeadline,
        'status' => $request->status,
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}


    // Delete the specified task from the database
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
