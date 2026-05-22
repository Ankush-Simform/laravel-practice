<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->update($request->all());

        return $task;
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}