<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Presenters\UserPresenter;
use App\Validators\UserValidator;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Repository\Events\RepositoryEntityUpdating;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityCreating;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class UserRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
        'email_verified_at',
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
        return User::class;
    }


    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UserValidator::class;
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
        return UserPresenter::class;
    }


    /**
     * @param array $attributes
     *
     * @return LengthAwarePaginator|Collection|mixed
     * @throws RepositoryException
     * @throws ValidatorException
     * @throws Exception
     */
    public function create(array $attributes)
    {
        $this->validator->with($attributes)
            ->passesOrFail(ValidatorInterface::RULE_CREATE);
        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);
        event(new RepositoryEntityCreating($this, $attributes));
        $roles = $attributes['roles'] ?? null;
        if ($roles) unset($attributes['roles']);
        $model = $this->model->newInstance($attributes);
        $model->save();
        if ($roles) {
            $model->syncRoles($roles);
        }
        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();
        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }


    /**
     * @param array $attributes
     * @param       $id
     *
     * @return LengthAwarePaginator|Collection|mixed
     * @throws RepositoryException
     * @throws ValidatorException
     */
    public function update(array $attributes, $id)
    {
        $this->validator->with($attributes)
            ->passesOrFail(ValidatorInterface::RULE_UPDATE);
        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);
        /**
         * @var User $model
         */
        $model = $this->model->findOrFail($id);
        event(new RepositoryEntityUpdating($this, $model));
        $roles = $attributes['roles'] ?? null;
        if ($roles) unset($attributes['roles']);
        $model->fill($attributes);
        $model->save();
        if ($roles) {
            $model->syncRoles($roles);
        }
        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();
        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
}
