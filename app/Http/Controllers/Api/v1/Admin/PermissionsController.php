<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Illuminate\Http\JsonResponse;
use App\Validators\PermissionValidator;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;

class PermissionsController extends ApiController
{

    /**
     * @var PermissionRepository
     */
    protected $repository;

    /**
     * @var PermissionValidator
     */
    protected $validator;


    /**
     * UsersController constructor.
     *
     * @param PermissionRepository $repository
     * @param PermissionValidator  $validator
     */
    public function __construct(PermissionRepository $repository, PermissionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->authorizeResource(\App\Models\Permission::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->defaultIndex($this->repository);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(PermissionCreateRequest $request)
    {
        return $this->defaultStore($this->repository, $this->validator, $request);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        return $this->defaultShow($this->repository, $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdateRequest $request
     * @param string                  $id
     *
     * @return JsonResponse
     *
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        return $this->defaultUpdate($this->repository, $this->validator, $request, $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        return $this->defaultDelete($this->repository, $id);
    }


    /**
     * Restore the specified resource
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function restore($id)
    {
        return $this->defaultRestore($this->repository, $id);
    }
}
