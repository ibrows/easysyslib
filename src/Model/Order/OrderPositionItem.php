<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 15:57
 */

namespace Ibrows\EasySysLibrary\Model\Order;

use Ibrows\EasySysLibrary\Model\AmountInterface;
use Ibrows\EasySysLibrary\Model\Traits\Position\ItemPosition;

class OrderPositionItem extends OrderPosition implements AmountInterface
{
    use ItemPosition;
}