<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('permissions', Admin\PermissionsController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
]);
Route::patch('permissions/{permission}/restore', [Admin\PermissionsController::class, 'restore'])
     ->name('permissions.restore');
