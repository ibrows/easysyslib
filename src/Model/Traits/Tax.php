<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 20:45
 */

namespace Ibrows\EasySysLibrary\Model\Traits;

trait Tax
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
        throw new \Exception("Its not allowed to create new taxes");
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