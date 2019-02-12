<?php

namespace App\Entities;

use App\Traits\CryptID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Offer.
 *
 * @package namespace App\Entities;
 */
class Offer extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use CryptID;

    protected $table = 'offers';
    protected $primaryKey = 'id';
    protected $fillable = ['title','code','url','story_id','image','gallery','total_price','plots','plots_price','available','available_to'];
    protected $dates = ['created_at','updated_at','deleted_at','available_to'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'story_id');
    }

    public function toggleStatus()
    {
        try {

            $this->available = ($this->available=='n') ? 'y' : 'n';
            return $this->save();

        } catch (\Exception $e) {
            return false;
        }
    }

}
