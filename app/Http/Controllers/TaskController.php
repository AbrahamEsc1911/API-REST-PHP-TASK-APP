<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar los datos (sin `required` para `status`)
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'nullable|in:pending,in progress,done', // Status ya no es requerido
            ]);

            // Si no se proporciona el `status`, asignar "pending" por defecto
            $validatedData['status'] = $validatedData['status'] ?? 'pending';

            // Asignar el `user_id` del usuario autenticado
            $validatedData['user_id'] = auth()->id();

            // Crear la tarea
            $task = Task::create($validatedData);

            return response()->json([
                'message' => 'Task created successfully',
                'task' => $task
            ], 201);
        } catch (Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al crear la tarea: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error al crear la tarea.',
                'error' => $e->getMessage()
            ], 500);
        }
    }





    public function show(Task $task)
    {
        return response()->json($task); // Return a single task as JSON
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
