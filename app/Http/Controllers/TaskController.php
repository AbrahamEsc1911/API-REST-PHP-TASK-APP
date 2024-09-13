<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'description' => 'nullable|string',
            'status' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error validating data',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
            }

            $data = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'user_id' => $request->user()->id
            ]);

            return response()->json(['message' => 'Task created successfully', 'task' => $data], 201);
    }

    public function getUserTasks(Request $request)
    {
        $user = Auth::user();

        if(!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json(['tasks' => $tasks], 200);
    }

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

    public function destroy(Task $task)
    {
        $task->delete(); // Delete task

        return response()->json(null, 204); // Return no content response
    }
}
