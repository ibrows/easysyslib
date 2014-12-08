<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 13:58
 */

namespace Ibrows\EasySysLibrary\Model;

class OrderTax
{
    /**
     * @var float
     */
    protected $percentage;

    /**
     * @var float
     */
    protected $value;

    public function __construct()
    {
        throw new \Exception("Its not allowed to create new ordertaxes");
    }

    /**
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param float $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
} 