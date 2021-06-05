<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::post('roles/{role}/permission', [Admin\RolePermissionsController::class, 'store'])
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
