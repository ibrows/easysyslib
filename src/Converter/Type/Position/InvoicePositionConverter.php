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

use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionDefaultConverter;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionItemConverter;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionSubPositionConverter;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionTextConverter;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionDiscountConverter;

class InvoicePositionConverter extends PositionConverter
{
    /**
     * @return array
     */
    protected function setupTypes()
    {
        return array(
            'KbPositionArticle'     => new InvoicePositionItemConverter(),
            'KbPositionCustom'      => new InvoicePositionDefaultConverter(),
            'KbPositionText'        => new InvoicePositionTextConverter(),
            'KbPositionSubposition' => new InvoicePositionSubPositionConverter(),
            'KbPositionDiscount'    => new InvoicePositionDiscountConverter(),
        );
    }
}