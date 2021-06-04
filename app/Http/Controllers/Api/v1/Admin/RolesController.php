<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Validators\RoleValidator;
use Illuminate\Http\JsonResponse;
use App\Repositories\RoleRepository;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Controllers\Api\ApiController;

class RolesController extends ApiController
{

    /**
     * @var RoleRepository
     */
    protected $repository;

    /**
     * @var RoleValidator
     */
    protected $validator;


    /**
     * UsersController constructor.
     *
     * @param RoleRepository $repository
     * @param RoleValidator  $validator
     */
    public function __construct(RoleRepository $repository, RoleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
     * @param RoleCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(RoleCreateRequest $request)
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
     * @param RoleUpdateRequest $request
     * @param string            $id
     *
     * @return JsonResponse
     *
     */
    public function update(RoleUpdateRequest $request, $id)
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
