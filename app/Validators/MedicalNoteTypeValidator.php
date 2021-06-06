<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MedicalNoteTypeValidator.
 *
 * @package namespace App\Validators;
 */
class MedicalNoteTypeValidator extends LaravelValidator
{

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|string|unique:medical_note_types,name',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|string',
        ],
    ];
}
