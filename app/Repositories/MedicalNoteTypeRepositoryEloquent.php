<?php

namespace App\Repositories;

use App\Models\MedicalNoteType;
use App\Presenters\MedicalNoteTypePresenter;
use App\Validators\MedicalNoteTypeValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class MedicalNoteTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MedicalNoteTypeRepositoryEloquent extends BaseRepository implements MedicalNoteTypeRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MedicalNoteType::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return MedicalNoteTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * @return string
     */
    public function presenter()
    {
        return MedicalNoteTypePresenter::class;
    }
}
