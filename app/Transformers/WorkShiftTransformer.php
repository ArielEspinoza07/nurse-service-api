<?php

namespace App\Transformers;

use App\Models\WorkShift;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

/**
 * Class WorkShiftTransformer.
 *
 * @package namespace App\Transformers;
 */
class WorkShiftTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'work_shift_time',
    ];


    /**
     * Transform the WorkShift entity.
     *
     * @param WorkShift $model
     *
     * @return array
     */
    public function transform(WorkShift $model): array
    {
        return [
            'id'                 => (int)$model->id,
            'work_date'          => $model->work_date ? $model->work_date->toDateString() : null,
            'extra'              => (bool)$model->extra,
            'work_shift_time_id' => (int)$model->work_shift_time_id,
            'user_id'            => (int)$model->user_id,
            'created_at'         => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at'         => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at'         => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }


    /**
     * @param WorkShift $model
     *
     * @return Item
     */
    protected function includeWorkShiftTime(WorkShift $model): Item
    {
        return $this->item($model->workShiftTime, new WorkShiftTimeTransformer());
    }
}
