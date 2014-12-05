<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:31
 */

namespace Ibrows\EasySysLibrary\API;

class Order extends AbstractAPI
{
    /**
     * @return string
     */
    protected function getType()
    {
        return 'kb_order';
    }
}