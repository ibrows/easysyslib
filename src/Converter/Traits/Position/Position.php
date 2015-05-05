<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:19
 */

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait Position
{
    /**
     * @return array
     */
    protected function getPositionMapping()
    {
        return array(
            'id'           => 'id', // int
            'type'         => 'type', // string
            'parent_id'    => 'parentId', // int
            'internal_pos' => 'internalPosition', // int
            'pos'          => 'position', // int
            'is_optional'  => 'optional', // bool
            'text'         => 'text', // string
            'account_id'   => 'accountId' // int
        );
    }
}