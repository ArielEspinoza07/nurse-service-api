<?php

namespace App\Models;

use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Role
 * @property int                               id
 * @property string                            name
 * @property string                            guard
 * @property DateTime                          created_at
 * @property DateTime                          updated_at
 * @property DateTime                          deleted_at
 *
 * @property-read Collection|Permission[]|null permissions
 * @property-read Collection|User[]|null       users
 *
 * @package App\Models
 */
class Role extends SpatieRole
{

    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $table = 'roles';

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

