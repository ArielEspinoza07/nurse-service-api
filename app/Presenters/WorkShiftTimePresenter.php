<?php

namespace App\Presenters;

use App\Transformers\WorkShiftTimeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WorkShiftTimePresenter.
 *
 * @package namespace App\Presenters;
 */
class WorkShiftTimePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WorkShiftTimeTransformer();
    }
}
