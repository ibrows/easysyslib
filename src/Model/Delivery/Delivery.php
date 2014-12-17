<?php

namespace Ibrows\EasySysLibrary\Model\Delivery;

use Ibrows\EasySysLibrary\Model\Traits\Document;

class Delivery
{
    use Document;

    /**
     * @var int
     */
    protected $deliveryAddressType;

    /**
     * @var string
     */
    protected $deliveryAddress;

    /**
     * @return int
     */
    public function getDeliveryAddressType()
    {
        return $this->deliveryAddressType;
    }

    /**
     * @param $deliveryAddressType
     */
    public function setDeliveryAddressType($deliveryAddressType)
    {
        $this->deliveryAddressType = $deliveryAddressType;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param null $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }
}