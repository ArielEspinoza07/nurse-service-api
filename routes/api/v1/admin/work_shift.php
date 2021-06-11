<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('work/shift', Admin\WorkShiftsController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
])
     ->names('work.shift');
Route::patch('work/shift/{shift}/restore', [Admin\WorkShiftsController::class, 'restore'])
     ->name('work.shift.restore');
