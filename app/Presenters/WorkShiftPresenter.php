<?php

namespace App\Presenters;

use App\Transformers\WorkShiftTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WorkShiftPresenter.
 *
 * @package namespace App\Presenters;
 */
class WorkShiftPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WorkShiftTransformer();
    }
}
