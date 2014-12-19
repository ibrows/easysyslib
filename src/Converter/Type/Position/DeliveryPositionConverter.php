<?php

namespace Ibrows\EasySysLibrary\Converter\Type\Position;

use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryPositionDefaultConverter;
use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryPositionDiscountConverter;
use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryPositionItemConverter;
use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryPositionTextConverter;

class DeliveryPositionConverter extends PositionConverter
{
    /**
     * @return array
     */
    protected function setupTypes()
    {
        return array(
            'KbPositionArticle'     => new DeliveryPositionItemConverter(),
            'KbPositionText'        => new DeliveryPositionTextConverter(),
            'KbPositionCustom'      => new DeliveryPositionDefaultConverter(),
            'KbPositionDiscount'    => new DeliveryPositionDiscountConverter()
        );
    }
}