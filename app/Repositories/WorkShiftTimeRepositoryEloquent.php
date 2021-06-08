<?php

namespace App\Repositories;

use App\Models\WorkShiftTime;
use App\Validators\WorkShiftTimeValidator;
use App\Presenters\WorkShiftTimePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class WorkShiftTimeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WorkShiftTimeRepositoryEloquent extends BaseRepository implements WorkShiftTimeRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'start_at',
        'end_at',
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
        return WorkShiftTime::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return WorkShiftTimeValidator::class;
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
        return WorkShiftTimePresenter::class;
    }
}
