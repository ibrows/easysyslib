<?php

namespace Ibrows\EasySysLibrary\Converter\Delivery;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Tax;

class DeliveryTaxConverter extends AbstractConverter
{
    use Tax;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\DeliveryTax';
} 