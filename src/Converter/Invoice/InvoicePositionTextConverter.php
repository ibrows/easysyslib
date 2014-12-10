<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:53
 */

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\Traits\Position\TextPosition;

class InvoicePositionTextConverter extends InvoicePositionConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\InvoicePositionText';

    use TextPosition;

    /**
     * @return array
     */
    protected function getBaseMapping()
    {
        return $this->mapping;
    }
}