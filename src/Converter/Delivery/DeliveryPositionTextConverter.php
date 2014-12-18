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

use Ibrows\EasySysLibrary\Converter\Traits\Position\TextPosition;

class DeliveryPositionTextConverter extends DeliveryPositionConverter
{
    use TextPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\DeliveryPositionText';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getTextPositionMapping());
    }
}