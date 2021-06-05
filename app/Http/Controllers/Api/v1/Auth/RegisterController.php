<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;

/**
 * Class RegistrationController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends ApiController
{

    /**
     *
     * @return JsonResponse
     */
    public function register(): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if ($validator->fails()) {

            return $this->error('Fail registering.', [
                'errors' => $validator->errors()
                                      ->all()
            ], 422);
        }
        User::create($validator->validated());

        return $this->success('The register was successful.', [], 200);
    }
}

