<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 * 
 * User: mikemeier
 * Date: 05.12.14
 * Time: 11:43
 */

namespace Ibrows\EasySysLibrary\Model\Delivery;

use Ibrows\EasySysLibrary\Model\AmountInterface;
use Ibrows\EasySysLibrary\Model\Traits\Position\DefaultPosition;

class DeliveryPositionDefault extends DeliveryPosition implements AmountInterface
{
    use DefaultPosition;
}