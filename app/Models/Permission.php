<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @property int                         id
 * @property string                      name
 * @property string                      guard
 * @property Carbon                    created_at
 * @property Carbon                    updated_at
 * @property Carbon                    deleted_at
 *
 * @property-read Collection|Role[]|null roles
 *
 * @package App\Models
 */
class Permission extends SpatiePermission
{

    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $table = 'permissions';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $casts = [
        'id'         => 'int',
        'name'       => 'string',
        'guard'      => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];
}
