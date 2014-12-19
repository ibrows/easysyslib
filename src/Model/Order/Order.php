<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 11:26
 */

namespace Ibrows\EasySysLibrary\Model\Order;

use Ibrows\EasySysLibrary\Api\OrderApi;
use Ibrows\EasySysLibrary\Model\Traits\Document;
use Ibrows\EasySysLibrary\Model\PositionInterface;

class Order
{
    use Document;

    /**
     * @var bool
     */
    protected $compactView;

    /**
     * @var string
     */
    protected $networkLink;

    /**
     * @var string
     */
    protected $contactAddressManual;

    /**
     * @var bool
     */
    protected $showPositionTaxes;

    /**
     * @var int
     */
    protected $deliveryAddressType;

    /**
     * @var string
     */
    protected $deliveryAddress;

    /**
     * @var string
     */
    protected $deliveryAddressManual;

    /**
     * @var bool
     */
    protected $recurring;

    /**
     * @var int
     */
    protected $nbDecimalsAmount;

    /**
     * @var int
     */
    protected $nbDecimalsPrice;

    /**
     * @return boolean
     */
    public function isCompactView()
    {
        return $this->compactView;
    }

    /**
     * @param boolean $compactView
     */
    public function setCompactView($compactView)
    {
        $this->compactView = $compactView;
    }

    /**
     * @return string
     */
    public function getContactAddressManual()
    {
        return $this->contactAddressManual;
    }

    /**
     * @param string $contactAddressManual
     */
    public function setContactAddressManual($contactAddressManual)
    {
        $this->contactAddressManual = $contactAddressManual;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressManual()
    {
        return $this->deliveryAddressManual;
    }

    /**
     * @param string $deliveryAddressManual
     */
    public function setDeliveryAddressManual($deliveryAddressManual)
    {
        $this->setDeliveryAddressType(OrderApi::DELIVERY_TYPE_OWN);
        $this->deliveryAddressManual = $deliveryAddressManual;
    }

    /**
     * @return int
     */
    public function getDeliveryAddressType()
    {
        return $this->deliveryAddressType;
    }

    /**
     * @param int $deliveryAddressType
     */
    public function setDeliveryAddressType($deliveryAddressType)
    {
        $this->deliveryAddressType = $deliveryAddressType;
    }

    /**
     * @return int
     */
    public function getNbDecimalsAmount()
    {
        return $this->nbDecimalsAmount;
    }

    /**
     * @param int $nbDecimalsAmount
     */
    public function setNbDecimalsAmount($nbDecimalsAmount)
    {
        $this->nbDecimalsAmount = $nbDecimalsAmount;
    }

    /**
     * @return int
     */
    public function getNbDecimalsPrice()
    {
        return $this->nbDecimalsPrice;
    }

    /**
     * @param int $nbDecimalsPrice
     */
    public function setNbDecimalsPrice($nbDecimalsPrice)
    {
        $this->nbDecimalsPrice = $nbDecimalsPrice;
    }

    /**
     * @return boolean
     */
    public function isRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param boolean $recurring
     */
    public function setRecurring($recurring)
    {
        $this->recurring = $recurring;
    }

    /**
     * @return boolean
     */
    public function isShowPositionTaxes()
    {
        return $this->showPositionTaxes;
    }

    /**
     * @param boolean $showPositionTaxes
     */
    public function setShowPositionTaxes($showPositionTaxes)
    {
        $this->showPositionTaxes = $showPositionTaxes;
    }

    /**
     * @return string
     */
    public function getNetworkLink()
    {
        return $this->networkLink;
    }

    /**
     * @param string $networkLink
     */
    public function setNetworkLink($networkLink)
    {
        $this->networkLink = $networkLink;
    }

    /**
     * @return PositionInterface[]
     */
    public function getDeliveryPositions()
    {
        $positions = array();
        foreach ($this->positions as $position) {
            if (!$position instanceof OrderPositionDiscount) {
                $positions[] = $position;
            }
        }

        return $positions;
    }
}