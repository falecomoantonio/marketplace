<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Newsletter.
 *
 * @package namespace App\Entities;
 */
class Newsletter extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'newsletters';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'whatsapp',];
    protected $dates = ['created_at','updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
