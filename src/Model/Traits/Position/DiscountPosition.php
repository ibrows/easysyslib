<?php

namespace Ibrows\EasySysLibrary\Model\Traits\Position;

trait DiscountPosition
{
    /**
     * @var float
     */
    protected $discountTotal;

    /**
     * @var boolean
     */
    protected $percentual;

    /**
     * @var float
     */
    protected $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getDiscountTotal()
    {
        return $this->discountTotal;
    }

    /**
     * @param $discountTotal
     */
    public function setDiscountTotal($discountTotal)
    {
        $this->discountTotal = $discountTotal;
    }

    /**
     * @return bool
     */
    public function getPercentual()
    {
        return $this->percentual;
    }

    /**
     * @param $percentual
     */
    public function setPercentual($percentual)
    {
        $this->percentual = $percentual;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'KbPositionDiscount';
    }
} 