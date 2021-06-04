<?php

namespace App\Http\Controllers\Api\v1\Auth;

;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends ApiController
{

    /**
     * @var UserRepository
     */
    protected $repository;


    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'email'    => 'required|string|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);
        if ($validator->fails()) {

            return $this->error('Password or Email mismatch.', [], 422);
        }
        $this->repository->skipPresenter(true);
        $user = $this->repository->findWhere(['email' => request()->get('email')])
                                 ->first();
        if ( ! $user) {
            return $this->error('Password or Email mismatch.', [], 422);
        }
        if ( ! Hash::check(request()->get('password'), $user->password)) {

            return $this->error('Password or Email mismatch.', [], 422);
        }
        $this->repository->skipPresenter(false);

        return $this->success('Logged in.', [
            'user'  => $user,
            'token' => $user->createToken(env('APP_TOKEN_NAME', env('APP_NAME')))->accessToken
        ]);
    }


    /**
     * @return JsonResponse
     */
    public function user(): JsonResponse
    {
        return $this->defaultShow($this->repository, auth()->id());
    }


    /**
     *
     * @return JsonResponse
     */
    public function passwordChange(): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'old_password' => 'required',
            'password'     => 'required|string|confirmed|min:6',
        ]);
        if ($validator->fails()) {

            return $this->error('Fail updating password.', [
                'errors' => $validator->errors()
                                      ->all()
            ], 422);
        }
        if (Hash::check(request()->get('old_password'), auth()->user()->password) === false) {

            return $this->error('Check your old password.', [], 400);
        }
        if (Hash::check(request()->get('password'), auth()->user()->password) === true) {

            return $this->error('Please enter a password that is not a similar then-current password.', [], 400);
        }
        /**
         * @var User $user
         */
        $user           = auth()->user();
        $user->password = request()->get('password');
        $user->save();

        return $this->success('Password updated successfully.', ['data' => ['user' => $user]]);
    }


    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return $this->success('Logged out.');
    }

}

