<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 11:43
 */

namespace Ibrows\EasySysLibrary\Model\Invoice;

use Ibrows\EasySysLibrary\Model\AmountInterface;
use Ibrows\EasySysLibrary\Model\Traits\Position\DefaultPosition;

class InvoicePositionDefault extends InvoicePosition implements AmountInterface
{
    use DefaultPosition;
}