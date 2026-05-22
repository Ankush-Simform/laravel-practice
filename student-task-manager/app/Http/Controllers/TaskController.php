<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks  = Task::all();
        return view('tasks.index', compact('tasks'));
    }   
    public function create(Request $request)
    {
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|min:3'
        ]);
        //saving into db
        Task::create([
            'title' => $request->title,
            'user_id' => auth()->id(),   
            'completed' => false
        ]);

        //redirect
        return redirect()->route('tasks.index');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $task->update([
            'title' => $request->title
        ]);
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
