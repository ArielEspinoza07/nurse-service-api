<?php

namespace App\Repositories;

use App\Models\WorkShift;
use App\Presenters\WorkShiftPresenter;
use App\Validators\WorkShiftValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class WorkShiftRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WorkShiftRepositoryEloquent extends BaseRepository implements WorkShiftRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'work_date',
        'extra',
        'work_shift_time_id',
        'user_id',
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
        return WorkShift::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return WorkShiftValidator::class;
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
        return WorkShiftPresenter::class;
    }
}
