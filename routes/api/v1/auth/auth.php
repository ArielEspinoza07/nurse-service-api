<?php

use App\Http\Controllers\Api\v1\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/register', [Auth\RegisterController::class , 'register'])
     ->name('register');

Route::post('/login', [Auth\LoginController::class , 'login'])
     ->name('login');

Route::middleware('auth:api')
     ->post('logout', [Auth\LoginController::class , 'logout'])
     ->name('logout');

Route::middleware('auth:api')
     ->post('change/password', [Auth\LoginController::class , 'passwordChange'])
     ->name('password.change');

Route::get('email/verify/{id}', [Auth\VerificationController::class , 'verifyEmail'])
     ->name('verification.verify');

Route::middleware('auth:api')
     ->post('email/resend', [Auth\VerificationController::class , 'resendEmail'])
     ->name('verification.resend');

Route::post('password/forgot', [Auth\ForgotPasswordController::class , 'forgotPassword'])
     ->name('password.forgot');

Route::post('password/reset', [Auth\ForgotPasswordController::class , 'resetPassword'])
     ->name('password.reset');

Route::middleware('auth:api')
     ->get('user', [Auth\LoginController::class, 'authUser'])
     ->name('auth.user');
