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
                  require_once 'admin/medical_note.php';
                  require_once 'admin/medical_note_type.php';
                  require_once 'admin/permission.php';
                  require_once 'admin/role.php';
                  require_once 'admin/user.php';
                  require_once 'admin/work_shift.php';
                  require_once 'admin/work_shift_time.php';
              });
     });
