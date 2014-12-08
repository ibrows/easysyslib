<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:53
 */

namespace Ibrows\EasySysLibrary\Converter;

class OrderPositionTextConverter extends OrderPositionConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\OrderPositionText';

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->mapping,
            array(
                'show_pos_nr' => 'showPositionNumber',
            )
        );
    }
} 