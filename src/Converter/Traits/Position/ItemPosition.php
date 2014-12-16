<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:21
 */

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait ItemPosition
{
    /**
     * @return array
     */
    protected function getItemPositionMapping()
    {
        return array(
            'amount'              => 'amount',
            'unit_id'             => 'unitId',
            'unit_name'           => 'unitName',
            'unit_price'          => 'unitPrice',
            'article_id'          => 'articleId',
            'tax_id'              => 'taxId',
            'tax_value'           => 'taxValue',
            'discount_in_percent' => 'discountInPercent',
            'position_total'      => 'positionTotal',
        );
    }
} 