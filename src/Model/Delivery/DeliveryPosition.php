<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 11:39
 */

namespace Ibrows\EasySysLibrary\Model\Delivery;

use Ibrows\EasySysLibrary\Model\PositionInterface;
use Ibrows\EasySysLibrary\Model\Traits\Position\Position;

abstract class DeliveryPosition implements PositionInterface
{
    use Position;
} 