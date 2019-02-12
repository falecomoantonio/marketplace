<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OfferRepository;
use App\Entities\Offer;
use App\Validators\OfferValidator;

/**
 * Class OfferRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OfferRepositoryEloquent extends BaseRepository implements OfferRepository
{
    protected $fieldSearchable = [
        'title'=>'like',
        'code'=>'='
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Offer::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OfferValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
