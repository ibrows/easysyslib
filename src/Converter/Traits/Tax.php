<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:26
 */

namespace Ibrows\EasySysLibrary\Converter\Traits;

trait Tax
{
    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array(
            'percentage' => 'percentage',
            'value'      => 'value'
        );
    }
} 