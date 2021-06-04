<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PermissionValidator.
 *
 * @package namespace App\Validators;
 */
class PermissionValidator extends LaravelValidator
{

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'       => 'required|string|unique:permissions,name',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'       => 'required|string',
        ],
    ];
}
