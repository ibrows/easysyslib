<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:53
 */

namespace Ibrows\EasySysLibrary\Converter\Order;

class OrderPositionDefaultConverter extends OrderPositionConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\OrderPositionDefault';

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->mapping,
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
}