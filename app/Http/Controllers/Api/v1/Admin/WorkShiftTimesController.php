<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Illuminate\Http\JsonResponse;
use App\Validators\WorkShiftTimeValidator;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\WorkShiftTimeRepository;
use App\Http\Requests\WorkShiftTimeCreateRequest;
use App\Http\Requests\WorkShiftTimeUpdateRequest;

/**
 * Class WorkShiftTimesController.
 *
 * @package namespace App\Http\Controllers;
 */
class WorkShiftTimesController extends ApiController
{

    /**
     * @var WorkShiftTimeRepository
     */
    protected $repository;

    /**
     * @var WorkShiftTimeValidator
     */
    protected $validator;


    /**
     * WorkShiftTimesController constructor.
     *
     * @param WorkShiftTimeRepository $repository
     * @param WorkShiftTimeValidator  $validator
     */
    public function __construct(WorkShiftTimeRepository $repository, WorkShiftTimeValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->authorizeResource(\App\Models\WorkShiftTime::class);
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
     * @param WorkShiftTimeCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(WorkShiftTimeCreateRequest $request)
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
     * @param WorkShiftTimeUpdateRequest $request
     * @param string                     $id
     *
     * @return JsonResponse
     *
     */
    public function update(WorkShiftTimeUpdateRequest $request, $id)
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
