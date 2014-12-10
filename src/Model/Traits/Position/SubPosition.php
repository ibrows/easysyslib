<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 20:26
 */

namespace Ibrows\EasySysLibrary\Model\Traits\Position;

trait SubPosition
{
    /**
     * @var bool
     */
    protected $showPositionNumber;

    /**
     * @var bool
     */
    protected $showPositionPrices;

    /**
     * @var float
     */
    protected $totalSum;

    /**
     * @param bool $showPositionNumber
     */
    public function __construct($showPositionNumber)
    {
        $this->setShowPositionNumber($showPositionNumber);
    }

    /**
     * @return boolean
     */
    public function isShowPositionNumber()
    {
        return $this->showPositionNumber;
    }

    /**
     * @param boolean $showPositionNumber
     */
    public function setShowPositionNumber($showPositionNumber)
    {
        $this->showPositionNumber = $showPositionNumber;
    }

    /**
     * @return float
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * @param float $totalSum
     */
    public function setTotalSum($totalSum)
    {
        $this->totalSum = $totalSum;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'KbPositionSubposition';
    }

    /**
     * @return boolean
     */
    public function isShowPositionPrices()
    {
        return $this->showPositionPrices;
    }

    /**
     * @param boolean $showPositionPrices
     */
    public function setShowPositionPrices($showPositionPrices)
    {
        $this->showPositionPrices = $showPositionPrices;
    }
} 