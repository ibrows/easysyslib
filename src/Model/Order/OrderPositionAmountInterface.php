<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 * 
 * User: mikemeier
 * Date: 10.12.14
 * Time: 12:38
 */

namespace Ibrows\EasySysLibrary\Model\Order;

interface OrderPositionAmountInterface
{
    /**
     * @return int
     */
    public function getAmount();
} 