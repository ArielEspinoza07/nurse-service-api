<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\UserRoleAssignRequest;

class UserRolesController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRoleAssignRequest $request
     *
     * @return JsonResponse
     */
    public function store(UserRoleAssignRequest $request, User $user)
    {
        try {
            $user->syncRoles($request->validated());

            return $this->success('User Roles assigned.', $user);
        } catch (\Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }

}
