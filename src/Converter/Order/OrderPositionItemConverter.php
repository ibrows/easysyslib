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

class OrderPositionItemConverter extends OrderPositionConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order\OrderPositionItem';

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->mapping,
            array(
                'amount'              => 'amount',
                'unit_id'             => 'unitId',
                'unit_name'           => 'unitName',
                'unit_price'          => 'unitPrice',
                'article_id'          => 'articleId',
                'tax_id'              => 'taxId',
                'tax_value'           => 'taxValue',
                'account_id'          => 'accountId',
                'discount_in_percent' => 'discountInPercent',
                'position_total'      => 'positionTotal',
            )
        );
    }
}