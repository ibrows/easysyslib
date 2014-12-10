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

class OrderPositionSubPositionConverter extends OrderPositionConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\OrderPositionSubPosition';

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->mapping,
            array(
                'show_pos_nr'     => 'showPositionNumber',
                'total_sum'       => 'totalSum',
                'show_pos_prices' => 'showPositionPrices',
            )
        );
    }
} 