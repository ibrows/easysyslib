<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 17:19
 */

namespace Ibrows\EasySysLibrary\Converter;

abstract class OrderPositionConverter extends AbstractConverter
{
    /**
     * @var array
     */
    protected $mapping = array(
        'id'           => 'id', // int
        'type'         => 'type', // string
        'parent_id'    => 'parentId', // int
        'internal_pos' => 'internalPosition', // int
        'pos'          => 'position', // int
        'is_optional'  => 'optional',
    );
} 