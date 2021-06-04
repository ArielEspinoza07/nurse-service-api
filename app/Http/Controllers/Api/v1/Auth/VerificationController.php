<?php

namespace App\Http\Controllers\Api\v1\Auth;;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Api\ApiController;

/**
 * Class VerificationController
 * @package App\Http\Controllers\Auth
 */
class VerificationController extends ApiController
{

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function verifyEmail($id): JsonResponse
    {
        if ( ! request()->hasValidSignature()) {
            return $this->error('Invalid or Expired url provided.', [], 401);
        }
        /**
         * @var User $user
         */
        $user = User::query()
                    ->findOrFail($id);
        if ($user->hasVerifiedEmail()) {
            return $this->success('Email already verified.', [], 400);
        }
        $user->markEmailAsVerified();

        return $this->success('Email verified.');
    }


    /**
     * @return JsonResponse
     */
    public function resendEmail(): JsonResponse
    {
        if (auth()
            ->user()
            ->hasVerifiedEmail()) {
            return $this->success('Email already verified.', [], 400);
        }
        event(new Registered(auth()->user()));

        return $this->success('Email verification link sent on your email.');
    }
}
