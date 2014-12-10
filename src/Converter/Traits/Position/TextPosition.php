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
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getBaseMapping(),
            array(
                'show_pos_nr' => 'showPositionNumber',
            )
        );
    }

    /**
     * @return array
     */
    abstract protected function getBaseMapping();
}