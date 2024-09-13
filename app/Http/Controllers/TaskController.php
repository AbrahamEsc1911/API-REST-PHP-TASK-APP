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

    public function updateTaskById(Request $request, $id)
    {
    try {

        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        if (empty($id) || !is_numeric($id)) {
            return response()->json([
                'message' => 'Invalid or missing Id',
                'status' => 400
            ], 400);
        }

        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
                'status' => 404
            ], 404);
        }

        if (!$request->hasAny(['title', 'description', 'status'])) {
            return response()->json([
                'message' => 'Nothing provided to update',
                'status' => 400
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error validating data',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        if ($request->has('title')) {
            $task->title = $request->title;
        }

        if ($request->has('description')) {
            $task->description = $request->description;
        }

        if ($request->has('status')) {
            $task->status = $request->status;
        }

        $task->save();

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
            'status' => 200
        ], 200);

        } catch (\Exception $e) {
            return response()->json([
            'message' => 'An error occurred while updating the task',
            'error' => $e->getMessage(),
            'status' => 500
            ], 500);
        }
    }

    public function deleteTaskById($id)
{
    try {
        if (empty($id) || !is_numeric($id)) {
            return response()->json([
                'message' => 'Invalid or missing Id',
                'status' => 400
            ], 400);
        }

        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
                'status' => 404
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully',
            'status' => 200
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while deleting the task',
            'error' => $e->getMessage(),
            'status' => 500
        ], 500);
    }
}
}
