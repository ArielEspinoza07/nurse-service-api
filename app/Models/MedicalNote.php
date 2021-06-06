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
 * Class MedicalNote.
 * @property integer                   id
 * @property string                    name
 * @property string                    note
 * @property integer                   medical_note_type_id
 * @property integer                   user_id
 * @property Carbon                    created_at
 * @property Carbon                    updated_at
 * @property Carbon                    deleted_at
 *
 * @property-read MedicalNoteType|null medicalNoteType
 * @property-read User|null            user
 *
 * @package namespace App\Models;
 */
class MedicalNote extends Model implements Transformable
{

    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'medical_notes';

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
        'note',
        'medical_note_type_id',
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
        'id'                   => 'integer',
        'name'                 => 'string',
        'note'                 => 'string',
        'medical_note_type_id' => 'integer',
        'user_id'              => 'integer',
        'created_at'           => 'datetime:Y-m-d H:i:s',
        'updated_at'           => 'datetime:Y-m-d H:i:s',
        'deleted_at'           => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * @return BelongsTo
     */
    public function medicalNoteType(): BelongsTo
    {
        return $this->belongsTo(MedicalNoteType::class, 'medical_note_type_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
