<?php

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\Traits\Position\DiscountPosition;

class InvoicePositionDiscountConverter extends InvoicePositionConverter
{
    use DiscountPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\InvoicePositionDiscount';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getDiscountPositionMapping());
    }
}