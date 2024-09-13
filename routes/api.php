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

Route::post('/tasks', []);

Route::get('/tasks', function () {
    return 'getting all tasks';
});

Route::put('/tasks/{id}', function () {
    return 'updating tasks by id';
});
Route::delete('/tasks/{id}', function () {
    return 'delete tasks by id';
});
