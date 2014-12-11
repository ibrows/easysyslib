<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 15:42
 */

namespace Ibrows\EasySysLibrary\Converter\Type\Position;

use Ibrows\EasySysLibrary\Converter\Order\OrderPositionDefaultConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionDiscountConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionItemConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionSubPositionConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionTextConverter;

class OrderPositionConverter extends PositionConverter
{
    /**
     * @return array
     */
    protected function setupTypes()
    {
        return array(
            'KbPositionArticle'     => new OrderPositionItemConverter(),
            'KbPositionCustom'      => new OrderPositionDefaultConverter(),
            'KbPositionText'        => new OrderPositionTextConverter(),
            'KbPositionSubposition' => new OrderPositionSubPositionConverter(),
            'KbPositionDiscount'    => new OrderPositionDiscountConverter(),
        );
    }
}