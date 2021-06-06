<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('medical/notes', Admin\MedicalNotesController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
])
     ->names('medical.notes');
Route::patch('medical/notes/{notes}/restore', [Admin\MedicalNotesController::class, 'restore'])
     ->name('medical.notes.restore');
