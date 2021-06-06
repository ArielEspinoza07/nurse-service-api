<?php

namespace App\Presenters;

use App\Transformers\MedicalNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MedicalNotePresenter.
 *
 * @package namespace App\Presenters;
 */
class MedicalNotePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MedicalNoteTransformer();
    }
}
