<?php

namespace App\Presenters;

use App\Transformers\NewsletterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NewsletterPresenter.
 *
 * @package namespace App\Presenters;
 */
class NewsletterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsletterTransformer();
    }
}
