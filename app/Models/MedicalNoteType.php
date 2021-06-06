<?php

namespace App\Models;

use Datetime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MedicalNoteType.
 * @property integer  id
 * @property integer  name
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property DateTime deleted_at
 *
 * @package namespace App\Models;
 */
class MedicalNoteType extends Model implements Transformable
{

    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'medical_note_types';

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
        'id'         => 'integer',
        'name'       => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

}
