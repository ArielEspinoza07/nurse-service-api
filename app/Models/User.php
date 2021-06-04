<?php

namespace App\Models;

use DateTime;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @property integer            id
 * @property string             name
 * @property string             email
 * @property string             password
 * @property DateTime           email_verified_at
 * @property string             remember_token
 * @property DateTime           created_at
 * @property DateTime           updated_at
 * @property DateTime           deleted_at
 *
 * @property-read null|Customer customer
 *
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'image_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'name'              => 'string',
        'email'             => 'string',
        'password'          => 'string',
        'email_verified_at' => 'datetime:Y-m-d H:i:s',
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'deleted_at'        => 'datetime:Y-m-d H:i:s',
    ];


}
