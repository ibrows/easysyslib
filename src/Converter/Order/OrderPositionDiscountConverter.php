<?php

namespace Ibrows\EasySysLibrary\Converter\Order;

use Ibrows\EasySysLibrary\Converter\Traits\Position\DiscountPosition;

class OrderPositionDiscountConverter extends OrderPositionConverter
{
    use DiscountPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order\OrderPositionDiscount';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getDiscountPositionMapping());
    }
}