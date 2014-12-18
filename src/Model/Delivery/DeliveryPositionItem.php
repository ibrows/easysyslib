<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 15:57
 */

namespace Ibrows\EasySysLibrary\Model\Delivery;

use Ibrows\EasySysLibrary\Model\AmountInterface;
use Ibrows\EasySysLibrary\Model\Traits\Position\ItemPosition;

class DeliveryPositionItem extends DeliveryPosition implements AmountInterface
{
    use ItemPosition;
}