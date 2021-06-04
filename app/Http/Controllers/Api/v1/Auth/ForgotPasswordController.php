<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Events\ForgetPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;

/**
 * Class ForgotPasswordController
 * @package App\Http\Controllers\Auth
 */
class ForgotPasswordController extends ApiController
{

    /**
     * @return JsonResponse
     */
    public function forgotPassword(): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|exists:users,email'
        ]);
        if ($validator->fails()) {

            return $this->error('Invalid or Expired Email.', [], 422);
        }
        event(new ForgetPassword(request()->all()));

        return $this->success('Reset password link sent on your email.');
    }


    /**
     * @return JsonResponse
     */
    public function resetPassword(): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'email'    => 'required|email',
            'token'    => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
        if ($validator->fails()) {

            return $this->error('Password or Email mismatch.', [], 422);
        }
        $resetPasswordStatus = Password::reset(request()->all(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });
        if ($resetPasswordStatus == Password::INVALID_TOKEN) {
            return $this->error('Invalid or Expired token', [], 401);
        }

        return $this->success("Password has been successfully changed");
    }
}

