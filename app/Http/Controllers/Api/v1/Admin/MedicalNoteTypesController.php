<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Validators\MedicalNoteTypeValidator;
use App\Repositories\MedicalNoteTypeRepository;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MedicalNoteTypeCreateRequest;
use App\Http\Requests\MedicalNoteTypeUpdateRequest;

/**
 * Class MedicalNoteTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MedicalNoteTypesController extends ApiController
{

    /**
     * @var MedicalNoteTypeRepository
     */
    protected $repository;

    /**
     * @var MedicalNoteTypeValidator
     */
    protected $validator;


    /**
     * MedicalNoteTypesController constructor.
     *
     * @param MedicalNoteTypeRepository $repository
     * @param MedicalNoteTypeValidator  $validator
     */
    public function __construct(MedicalNoteTypeRepository $repository, MedicalNoteTypeValidator $validator)
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
     * @param MedicalNoteTypeCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(MedicalNoteTypeCreateRequest $request)
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
     * @param MedicalNoteTypeUpdateRequest $request
     * @param string                       $id
     *
     * @return JsonResponse
     *
     */
    public function update(MedicalNoteTypeUpdateRequest $request, $id)
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
