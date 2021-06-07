<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class IsAdminCriteria.
 *
 * @package namespace App\Criteria;
 */
class IsAdminCriteria implements CriteriaInterface
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

        return $model->where('user_id', auth()->id());
    }
}
