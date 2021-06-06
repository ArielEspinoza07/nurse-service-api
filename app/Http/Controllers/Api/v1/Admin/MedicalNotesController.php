<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Illuminate\Http\JsonResponse;
use App\Validators\MedicalNoteValidator;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\MedicalNoteRepository;
use App\Http\Requests\MedicalNoteCreateRequest;
use App\Http\Requests\MedicalNoteUpdateRequest;

/**
 * Class MedicalNotesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MedicalNotesController extends ApiController
{

    /**
     * @var MedicalNoteRepository
     */
    protected $repository;

    /**
     * @var MedicalNoteValidator
     */
    protected $validator;


    /**
     * MedicalNotesController constructor.
     *
     * @param MedicalNoteRepository $repository
     * @param MedicalNoteValidator  $validator
     */
    public function __construct(MedicalNoteRepository $repository, MedicalNoteValidator $validator)
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
     * @param MedicalNoteCreateRequest $request
     *
     * @return JsonResponse
     *
     */
    public function store(MedicalNoteCreateRequest $request)
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
     * @param MedicalNoteUpdateRequest $request
     * @param string                   $id
     *
     * @return JsonResponse
     *
     */
    public function update(MedicalNoteUpdateRequest $request, $id)
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
