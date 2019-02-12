<?php

namespace App\Entities;

use App\Traits\CryptID;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Store.
 *
 * @package namespace App\Entities;
 */
class Store extends Model implements Transformable
{
    use TransformableTrait;
    use CryptID;

    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    public function offers()
    {
        return $this->hasMany(Offer::class,'story_id');
    }
}
