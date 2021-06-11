<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WorkShift.
 * @property integer                 id
 * @property Carbon                  work_date
 * @property bool                    extra
 * @property integer                 work_shift_time_id
 * @property integer                 user_id
 * @property Carbon                  created_at
 * @property Carbon                  updated_at
 * @property Carbon                  deleted_at
 *
 * @property-read User|null          user
 * @property-read WorkShiftTime|null workShiftTime
 *
 * @package namespace App\Models;
 */
class WorkShift extends Model implements Transformable
{

    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'work_shifts';

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
        'work_date',
        'extra',
        'work_shift_time_id',
        'user_id',
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'work_date'          => 'datetime:Y-m-d',
        'extra'              => 'bool',
        'work_shift_time_id' => 'integer',
        'user_id'            => 'integer',
        'created_at'         => 'datetime:Y-m-d H:i:s',
        'updated_at'         => 'datetime:Y-m-d H:i:s',
        'deleted_at'         => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function workShiftTime(): BelongsTo
    {
        return $this->belongsTo(WorkShiftTime::class, 'work_shift_time_id', 'id');
    }
}
