<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class WorkShiftValidator.
 *
 * @package namespace App\Validators;
 */
class WorkShiftValidator extends LaravelValidator
{

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'work_date'          => 'required|date',
            'extra'              => 'boolean',
            'work_shift_time_id' => 'required|exists:work_shift_times,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'work_date'          => 'required|date',
            'extra'              => 'boolean',
            'work_shift_time_id' => 'required|exists:work_shift_times,id',
        ],
    ];
}
