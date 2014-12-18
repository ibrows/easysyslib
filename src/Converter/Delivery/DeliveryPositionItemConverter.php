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

use Ibrows\EasySysLibrary\Converter\Traits\Position\ItemPosition;

class DeliveryPositionItemConverter extends DeliveryPositionConverter
{
    use ItemPosition;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\DeliveryPositionItem';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(parent::setupMapping(), $this->getItemPositionMapping());
    }
}