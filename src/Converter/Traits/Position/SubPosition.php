<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:23
 */

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait SubPosition
{
    /**
     * @return array
     */
    protected function getSubPositionMapping()
    {
        return array(
            'show_pos_nr'     => 'showPositionNumber',
            'total_sum'       => 'totalSum',
            'show_pos_prices' => 'showPositionPrices',
        );
    }
} 