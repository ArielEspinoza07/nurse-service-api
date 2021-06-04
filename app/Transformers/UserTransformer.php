<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformerTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = [
        'roles',
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [];


    /**
     * Transform the UserTransformer entity.
     *
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model): array
    {
        return [
            'id'                => (int)$model->id,
            'name'              => (string)$model->name,
            'email'             => (string)$model->email,
            'email_verified_at' => $model->email_verified_at ? $model->email_verified_at->toDateTimeString() : null,
            'created_at'        => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at'        => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at'        => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }


    /**
     * @param User $model
     *
     * @return Collection
     */
    protected function includeRoles(User $model): Collection
    {
        return $this->collection($model->roles, new RoleTransformer());
    }
}
