<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class WorkShiftTimeValidator.
 *
 * @package namespace App\Validators;
 */
class WorkShiftTimeValidator extends LaravelValidator
{

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'     => 'required|string|unique:work_shift_times,name',
            'start_at' => 'string',
            'end_at'   => 'string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'     => 'required|string',
            'start_at' => 'string',
            'end_at'   => 'string',
        ],
    ];
}
