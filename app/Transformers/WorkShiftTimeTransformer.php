<?php

namespace App\Transformers;

use App\Models\WorkShiftTime;
use League\Fractal\TransformerAbstract;

/**
 * Class WorkShiftTimeTransformer.
 *
 * @package namespace App\Transformers;
 */
class WorkShiftTimeTransformer extends TransformerAbstract
{

    /**
     * Transform the WorkShiftTime entity.
     *
     * @param WorkShiftTime $model
     *
     * @return array
     */
    public function transform(WorkShiftTime $model): array
    {
        return [
            'id'         => (int)$model->id,
            'name'       => (string)$model->name,
            'start_at'   => $model->start_at ? $model->start_at->toTimeString() : null,
            'end_at'     => $model->end_at ? $model->end_at->toTimeString() : null,
            'created_at' => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at' => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at' => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }
}
