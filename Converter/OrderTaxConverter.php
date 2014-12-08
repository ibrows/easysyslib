<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:47
 */

namespace Ibrows\EasySysLibrary\Converter;

class OrderTaxConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\OrderTax';

    /**
     * @var array
     */
    protected $mapping = array(
        'percentage' => 'percentage',
        'value'      => 'value'
    );
} 