<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MedicalNoteValidator.
 *
 * @package namespace App\Validators;
 */
class MedicalNoteValidator extends LaravelValidator
{

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'                 => 'required|string',
            'note'                 => 'required|string',
            'medical_note_type_id' => 'required|integer|exists:medical_note_types,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'                 => 'required|string',
            'note'                 => 'required|string',
            'medical_note_type_id' => 'required|integer|exists:medical_note_types,id',
        ],
    ];
}
