<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:24
 */

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait TextPosition
{
    /**
     * @return array
     */
    protected function getTextPositionMapping()
    {
        return array(
            'show_pos_nr' => 'showPositionNumber',
        );
    }
}