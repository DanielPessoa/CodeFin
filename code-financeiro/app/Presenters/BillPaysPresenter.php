<?php

namespace CodeFin\Presenters;

use CodeFin\Transformers\BillPayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BankAccountPresenter
 *
 * @package namespace CodeFin\Presenters;
 */
class BillPaysPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillPayTransformer();
    }
}
