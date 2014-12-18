<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:53
 */

namespace Ibrows\EasySysLibrary\Converter\Delivery;

use Ibrows\EasySysLibrary\Converter\Traits\Position\DefaultPosition;

class DeliveryPositionDefaultConverter extends DeliveryPositionConverter
{
    use DefaultPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\DeliveryPositionDefault';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getDefaultPositionMapping());
    }
}