<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Exception;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RolePermissionAssignRequest;

class RolePermissionsController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param RolePermissionAssignRequest $request
     *
     * @return JsonResponse
     */
    public function store(RolePermissionAssignRequest $request, Role $role)
    {
        try {
            $role->syncPermissions($request->validated());

            return $this->success('Role Permission assigned.', $role);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }

}
