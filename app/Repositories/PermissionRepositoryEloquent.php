<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Presenters\PermissionPresenter;
use App\Validators\PermissionValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
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
        return Permission::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return PermissionValidator::class;
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
        return PermissionPresenter::class;
    }
}
