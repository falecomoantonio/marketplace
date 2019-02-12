<?php

namespace App\Entities;

use App\Traits\CryptID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable
{
    use Notifiable;
    use TransformableTrait;
    use SoftDeletes;
    use CryptID;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'username', 'email', 'password',];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['created_at','updated_at','deleted_at','email_verified_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


}
