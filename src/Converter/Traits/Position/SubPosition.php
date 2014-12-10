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
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getBaseMapping(),
            array(
                'show_pos_nr'     => 'showPositionNumber',
                'total_sum'       => 'totalSum',
                'show_pos_prices' => 'showPositionPrices',
            )
        );
    }

    /**
     * @return array
     */
    abstract protected function getBaseMapping();
} 