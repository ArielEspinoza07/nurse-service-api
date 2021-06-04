<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class RestoredCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class DeletedCriteria implements CriteriaInterface
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
        if (request()->has('deleted')) {
            $model = $model->withTrashed();
        }

        return $model;
    }
}
