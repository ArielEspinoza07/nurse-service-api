<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WorkShiftTime.
 * @property integer                          id
 * @property string                           name
 * @property Carbon                           start_at
 * @property Carbon                           end_at
 * @property Carbon                           created_at
 * @property Carbon                           updated_at
 * @property Carbon                           deleted_at
 *
 * @property-read Collection|WorkShift[]|null workShifts
 *
 * @package namespace App\Models;
 */
class WorkShiftTime extends Model implements Transformable
{

    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'work_shift_times';

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
        'start_at',
        'end_at',
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'name'       => 'string',
        'start_at'   => 'datetime:H:i:s',
        'end_at'     => 'datetime:H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * @return HasMany
     */
    public function workShifts(): HasMany
    {
        return $this->hasMany(WorkShift::class, 'work_shift_time_id', 'id');
    }
}
