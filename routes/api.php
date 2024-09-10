<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users', function () {
    return 'create new user';
});

Route::get('/users', function () {
    return 'getting user info to login';
});

Route::put('/users/{id}', function () {
    return 'Update user info like email and password by id';
});
Route::delete('/users/{id}', function () {
    return 'delete user by id';
});
