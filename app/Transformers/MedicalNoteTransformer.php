<?php

namespace App\Transformers;

use App\Models\MedicalNote;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

/**
 * Class MedicalNoteTransformer.
 *
 * @package namespace App\Transformers;
 */
class MedicalNoteTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'medical_note_type'
    ];


    /**
     * Transform the MedicalNote entity.
     *
     * @param MedicalNote $model
     *
     * @return array
     */
    public function transform(MedicalNote $model): array
    {
        return [
            'id'                   => (int)$model->id,
            'name'                 => (string)$model->name,
            'note'                 => (string)$model->note,
            'medical_note_type_id' => (int)$model->medical_note_type_id,
            'user_id'              => (int)$model->user_id,
            'created_at'           => $model->created_at ? $model->created_at->toDateTimeString() : null,
            'updated_at'           => $model->updated_at ? $model->updated_at->toDateTimeString() : null,
            'deleted_at'           => $model->deleted_at ? $model->deleted_at->toDateTimeString() : null,
        ];
    }


    /**
     * @param MedicalNote $model
     *
     * @return Item
     */
    protected function includeMedicalNoteType(MedicalNote $model): Item
    {
        return $this->item($model->medicalNoteType, new MedicalNoteTypeTransformer());
    }
}
