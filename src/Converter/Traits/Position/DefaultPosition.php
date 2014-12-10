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
    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getBaseMapping(),
            array(
                'amount'              => 'amount',
                'tax_id'              => 'taxId',
                'tax_value'           => 'taxValue',
                'unit_price'          => 'unitPrice',
                'position_total'      => 'positionTotal',
                'unit_name'           => 'unitName',
                'account_id'          => 'accountId',
                'discount_in_percent' => 'discountInPercent',
                'text'                => 'text',
                'unit_id'             => 'unitId'
            )
        );
    }

    /**
     * @return array
     */
    abstract protected function getBaseMapping();
} 