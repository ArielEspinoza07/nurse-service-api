<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Illuminate\Http\JsonResponse;
use App\Validators\WorkShiftValidator;
use App\Repositories\WorkShiftRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\WorkShiftCreateRequest;
use App\Http\Requests\WorkShiftUpdateRequest;

/**
 * Class WorkShiftsController.
 *
 * @package namespace App\Http\Controllers;
 */
class WorkShiftsController extends ApiController
{

    /**
     * @var WorkShiftRepository
     */
    protected $repository;

    /**
     * @var WorkShiftValidator
     */
    protected $validator;


    /**
     * WorkShiftsController constructor.
     *
     * @param WorkShiftRepository $repository
     * @param WorkShiftValidator  $validator
     */
    public function __construct(WorkShiftRepository $repository, WorkShiftValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->authorizeResource(\App\Models\WorkShift::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $this->repository->pushCriteria(app('App\Criteria\IsAdminCriteria'));

        return $this->defaultIndex($this->repository);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param WorkShiftCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(WorkShiftCreateRequest $request)
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
     * @param WorkShiftUpdateRequest $request
     * @param string                 $id
     *
     * @return JsonResponse
     *
     */
    public function update(WorkShiftUpdateRequest $request, $id)
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
