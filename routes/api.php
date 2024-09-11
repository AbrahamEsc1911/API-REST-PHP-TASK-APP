<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;

// User CRUD
Route::get('/users', [usersController::class, 'getAllUsers']);

Route::get('/users/{id}', [usersController::class, 'getUserById']);

Route::post('/users', [usersController::class, 'register'] );

Route::put('/users/{id}', [usersController::class, 'updateUserData']);

Route::delete('/users/{id?}', [usersController::class, 'deleteUser']);

// TASKS CRUD

Route::post('/tasks', function () {
    return 'creating a new tasks';
});

Route::get('/tasks', function () {
    return 'getting all tasks';
});

Route::put('/tasks/{id}', function () {
    return 'updating tasks by id';
});
Route::delete('/tasks/{id}', function () {
    return 'delete tasks by id';
});
