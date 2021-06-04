<?php

namespace App\Transformers;

use App\Models\Permission;
use League\Fractal\TransformerAbstract;

/**
 * Class PermissionTransformer.
 *
 * @package namespace App\Transformers;
 */
class PermissionTransformer extends TransformerAbstract
{

    /**
     * Transform the Permission entity.
     *
     * @param Permission $model
     *
     * @return array
     */
    public function transform(Permission $model): array
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
}
