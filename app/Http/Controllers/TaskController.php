<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all(); // Retrieves all tasks
        return response()->json($tasks); // Return tasks as JSON
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in progress,done',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = Task::create($request->all()); // Create new task

        return response()->json($task, 201); // Return created task with 201 status
    }

    /**
     * Display the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task); // Return a single task as JSON
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in progress,done',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update($request->all()); 

        return response()->json($task); 
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete(); // Delete task

        return response()->json(null, 204); // Return no content response
    }
}
