<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Offer;

/**
 * Class OfferTransformer.
 *
 * @package namespace App\Transformers;
 */
class OfferTransformer extends TransformerAbstract
{
    /**
     * Transform the Offer entity.
     *
     * @param \App\Entities\Offer $model
     *
     * @return array
     */
    public function transform(Offer $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
