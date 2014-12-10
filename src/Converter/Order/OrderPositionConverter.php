<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 17:19
 */

namespace Ibrows\EasySysLibrary\Converter\Order;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Position\Position;

abstract class OrderPositionConverter extends AbstractConverter
{
    use Position;

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return $this->getPositionMapping();
    }
} 