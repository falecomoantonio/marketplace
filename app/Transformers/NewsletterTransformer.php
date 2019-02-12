<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Newsletter;

/**
 * Class NewsletterTransformer.
 *
 * @package namespace App\Transformers;
 */
class NewsletterTransformer extends TransformerAbstract
{
    /**
     * Transform the Newsletter entity.
     *
     * @param \App\Entities\Newsletter $model
     *
     * @return array
     */
    public function transform(Newsletter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
