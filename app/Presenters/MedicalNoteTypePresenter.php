<?php

namespace App\Presenters;

use App\Transformers\MedicalNoteTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MedicalNoteTypePresenter.
 *
 * @package namespace App\Presenters;
 */
class MedicalNoteTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MedicalNoteTypeTransformer();
    }
}
