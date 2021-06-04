<?php

namespace App\Transformers;

use App\Models\Role;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class RoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = [
        'permissions'
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [];


    /**
     * Transform the Role entity.
     *
     * @param Role $model
     *
     * @return array
     */
    public function transform(Role $model): array
    {
        return [
            'id'         => (int)$model->id,
            'name'       => (string)$model->name,
            'guard_name' => (string)$model->guard_name,
            'created_at' => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at' => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at' => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }


    /**
     * @param Role $model
     *
     * @return Collection
     */
    protected function includePermissions(Role $model): Collection
    {
        return $this->collection($model->permissions, new PermissionTransformer());
    }
}
