<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('/users', Admin\UsersController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
Route::post('/users/{user}/role', [Admin\UserRolesController::class, 'store'])
     ->name('users.role.assign');

Route::patch('/users/{user}/restore', [Admin\UsersController::class, 'restore'])
     ->name('users.restore');
