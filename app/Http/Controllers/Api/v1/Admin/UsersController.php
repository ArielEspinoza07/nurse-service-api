<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Validators\UserValidator;
use Illuminate\Http\JsonResponse;
use App\Repositories\UserRepository;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Api\ApiController;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends ApiController
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;


    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator  $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->authorizeResource(\App\Models\User::class);
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
     * @param UserCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(UserCreateRequest $request)
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
     * @param UserUpdateRequest $request
     * @param string            $id
     *
     * @return JsonResponse
     *
     */
    public function update(UserUpdateRequest $request, $id)
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
