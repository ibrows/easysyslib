<?php

namespace Ibrows\EasySysLibrary\Converter\Type\Position;

use Ibrows\EasySysLibrary\Converter\Order\OrderPositionItemConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionTextConverter;

class DeliveryPositionConverter extends PositionConverter
{
    /**
     * @return array
     */
    protected function setupTypes()
    {
        return array(
            'KbPositionArticle'     => new OrderPositionItemConverter(),
            'KbPositionText'        => new OrderPositionTextConverter()
        );
    }
}