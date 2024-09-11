<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;

// User CRUD
Route::get('/users', [usersController::class, 'getAllUsers']);

Route::get('/users/{id}', [usersController::class, 'getUserById']);

Route::post('/users', [usersController::class, 'register'] );


Route::put('/users/{id}', function () {
    return 'Update user info like email and password by id';
});
Route::delete('/users/{id}', function () {
    return 'delete user by id';
});

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
