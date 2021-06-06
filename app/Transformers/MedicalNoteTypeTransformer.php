<?php

namespace App\Transformers;

use App\Models\MedicalNoteType;
use League\Fractal\TransformerAbstract;

/**
 * Class MedicalNoteTypeTransformer.
 *
 * @package namespace App\Transformers;
 */
class MedicalNoteTypeTransformer extends TransformerAbstract
{

    /**
     * Transform the MedicalNoteType entity.
     *
     * @param MedicalNoteType $model
     *
     * @return array
     */
    public function transform(MedicalNoteType $model): array
    {
        return [
            'id'         => (int)$model->id,
            'name'       => (string)$model->name,
            'created_at' => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at' => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at' => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }
}
