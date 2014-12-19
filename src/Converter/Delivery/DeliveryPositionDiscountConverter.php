<?php

namespace Ibrows\EasySysLibrary\Converter\Delivery;

use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryPositionConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Position\DiscountPosition;

class DeliveryPositionDiscountConverter extends DeliveryPositionConverter
{
    use DiscountPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\DeliveryPositionDiscount';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getDiscountPositionMapping());
    }
}