<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth;

Route::post('register', [Auth\RegisterController::class => 'register'])
     ->name('register');
Route::post('login', [Auth\LoginController::class => 'login'])
     ->name('login');
Route::post('logout', [Auth\LoginController::class => 'logout'])
     ->name('logout')
     ->middleware('auth:api');
Route::post('change/password', [Auth\LoginController::class => 'passwordChange'])
     ->name('password.change')
     ->middleware('auth:api');
Route::get('email/verify/{id}', [Auth\VerificationController::class => 'verifyEmail'])
     ->name('verification.verify');
Route::post('email/resend', [Auth\VerificationController::class => 'resendEmail'])
     ->name('verification.resend')
     ->middleware('auth:api');
Route::post('password/forgot', [Auth\ForgotPasswordController::class => 'forgotPassword'])
     ->name('password.forgot');
Route::post('password/reset', [Auth\ForgotPasswordController::class => 'resetPassword'])
     ->name('password.reset');
Route::get('user', [Auth\LoginController::class => 'authUser'])
     ->name('auth.user')
     ->middleware('auth:api');
