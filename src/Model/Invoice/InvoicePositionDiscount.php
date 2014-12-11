<?php

namespace Ibrows\EasySysLibrary\Model\Invoice;

use Ibrows\EasySysLibrary\Model\Traits\Position\DiscountPosition;

class InvoicePositionDiscount extends InvoicePosition
{
    use DiscountPosition;
}