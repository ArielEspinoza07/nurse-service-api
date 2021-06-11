<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UsersCriteria.
 *
 * @package namespace App\Criteria;
 */
class UsersCriteria implements CriteriaInterface
{

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (auth()
            ->user()
            ->isAdmin()) {

            return $model;
        }

        return $model->whereHas('roles', function (Builder $query) {
            $query->where('name', '<>', 'admin');
        });
    }
}
