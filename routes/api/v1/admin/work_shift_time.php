<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('work/shift/times', Admin\WorkShiftTimesController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
])
     ->names('work.shift.times');
Route::patch('work/shift/times/{time}/restore', [Admin\WorkShiftTimesController::class, 'restore'])
     ->name('work.shift.times.restore');
