<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 15:57
 */

namespace Ibrows\EasySysLibrary\Model;

class OrderPositionSubPosition extends OrderPosition
{
    /**
     * @var bool
     */
    protected $showPositionNumber;

    /**
     * @var float
     */
    protected $totalSum;

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
    protected function getType()
    {
        return 'KbPositionSubposition';
    }
}