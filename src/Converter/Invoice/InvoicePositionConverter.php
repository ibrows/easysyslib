<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 17:19
 */

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Position\Position;

abstract class InvoicePositionConverter extends AbstractConverter
{
    use Position;
} 