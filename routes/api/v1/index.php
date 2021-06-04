<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')
     ->group(function () {
         Route::prefix('auth')
              ->group(function () {
                  require_once 'auth/auth.php';
              });
         Route::middleware('auth:api')
              ->prefix('admin')
              ->as('admin.')
              ->group(function () {
                  require_once 'admin/acl.php';
              });
     });