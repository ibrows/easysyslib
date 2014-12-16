<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 * 
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:16
 */

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait DefaultPosition
{
    protected function getDefaultPositionMapping()
    {
        return array(
            'amount'              => 'amount',
            'tax_id'              => 'taxId',
            'tax_value'           => 'taxValue',
            'unit_price'          => 'unitPrice',
            'position_total'      => 'positionTotal',
            'unit_name'           => 'unitName',
            'discount_in_percent' => 'discountInPercent',
            'text'                => 'text',
            'unit_id'             => 'unitId'
        );
    }
} 