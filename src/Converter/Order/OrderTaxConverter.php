<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:47
 */

namespace Ibrows\EasySysLibrary\Converter\Order;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

class OrderTaxConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order\OrderTax';

    /**
     * @var array
     */
    protected $mapping = array(
        'percentage' => 'percentage',
        'value'      => 'value'
    );
} 