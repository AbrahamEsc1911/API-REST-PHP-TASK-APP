<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\TaskController;

// User CRUD
Route::get('/users', [usersController::class, 'getAllUsers']);
Route::get('/users/{id}', [usersController::class, 'getUserById']);
Route::post('/register', [usersController::class, 'register'] );
Route::post('/login', [usersController::class, 'login'] );
Route::middleware('auth:sanctum')->post('/logout', [usersController::class, 'logout']);
Route::put('/users/{id}', [usersController::class, 'updateUserData']);
Route::delete('/users/{id?}', [usersController::class, 'deleteUser']);

// TASKS CRUD
Route::middleware('auth:sanctum')->post('/tasks', [TaskController::class, 'createTask']);
Route::middleware('auth:sanctum')->get('/tasks', [TaskController::class, 'getUserTasks']);
Route::middleware('auth:sanctum')->put('/tasks/{id}', [TaskController::class, 'updateTaskById']);
Route::middleware('auth:sanctum')->delete('/tasks/{id}', [TaskController::class, 'deleteTaskById']);
