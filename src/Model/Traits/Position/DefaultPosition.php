<?php

namespace Ibrows\EasySysLibrary\Model\Traits\Position;

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 * 
 * User: mikemeier
 * Date: 10.12.14
 * Time: 20:20
 */
trait DefaultPosition
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var int
     */
    protected $taxId;

    /**
     * @var float
     */
    protected $taxValue;

    /**
     * @var float
     */
    protected $unitPrice;

    /**
     * @var string
     */
    protected $unitName;

    /**
     * @var float
     */
    protected $positionTotal;

    /**
     * @var int
     */
    protected $accountId;

    /**
     * @var float
     */
    protected $discountInPercent;

    /**
     * @var int
     */
    protected $unitId;

    /**
     * @param float $amount
     * @param int $taxId
     * @param float $unitPrice
     */
    public function __construct($amount, $taxId, $unitPrice)
    {
        $this->amount = $amount;
        $this->taxId = $taxId;
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getDiscountInPercent()
    {
        return $this->discountInPercent;
    }

    /**
     * @param float $discountInPercent
     */
    public function setDiscountInPercent($discountInPercent)
    {
        $this->discountInPercent = $discountInPercent;
    }

    /**
     * @return int
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param int $taxId
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'KbPositionCustom';
    }

    /**
     * @return int
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @param int $unitId
     */
    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return string
     */
    public function getUnitName()
    {
        return $this->unitName;
    }

    /**
     * @param string $unitName
     */
    public function setUnitName($unitName)
    {
        $this->unitName = $unitName;
    }

    /**
     * @return float
     */
    public function getTaxValue()
    {
        return $this->taxValue;
    }

    /**
     * @param float $taxValue
     */
    public function setTaxValue($taxValue)
    {
        $this->taxValue = $taxValue;
    }

    /**
     * @return float
     */
    public function getPositionTotal()
    {
        return $this->positionTotal;
    }

    /**
     * @param float $positionTotal
     */
    public function setPositionTotal($positionTotal)
    {
        $this->positionTotal = $positionTotal;
    }
}