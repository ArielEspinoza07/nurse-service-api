<?php

namespace App\Repositories;

use App\Models\Role;
use App\Presenters\RolePresenter;
use App\Validators\RoleValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class RoleRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return RoleValidator::class;
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
        return RolePresenter::class;
    }
}
