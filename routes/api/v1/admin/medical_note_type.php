<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin;

Route::apiResource('medical/note/types', Admin\MedicalNoteTypesController::class, [
    'index',
    'store',
    'show',
    'update',
    'destroy',
])->names('medical.note.types');
Route::patch('medical/note/types/{types}/restore', [Admin\MedicalNoteTypesController::class, 'restore'])
     ->name('medical.note.types.restore');
