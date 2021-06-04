<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::post('users/{user}/role', [Admin\UserRolesController::class => 'store'])
     ->name('users.role.assign');

Route::apiResource('users', Admin\UsersController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
Route::patch('users/{user}/restore', [Admin\UsersController::class, 'restore'])
     ->name('users.restore');

Route::post('roles/{role}/permission', [Admin\RolesController::class => 'store'])
     ->name('roles.permissions.assign');

Route::apiResource('roles', Admin\RolesController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
Route::patch('roles/{role}/restore', [Admin\RolesController::class, 'restore'])
     ->name('roles.restore');

Route::apiResource('permissions', Admin\PermissionsController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
Route::patch('permissions/{permission}/restore', [Admin\PermissionsController::class, 'restore'])
     ->name('permissions.restore');
