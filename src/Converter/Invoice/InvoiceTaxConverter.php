<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:47
 */

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Tax;

class InvoiceTaxConverter extends AbstractConverter
{
    use Tax;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\InvoiceTax';
} 