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

class OrderPositionText extends OrderPosition
{
    /**
     * @var bool
     */
    protected $showPositionNumber;

    /**
     * @param string $text
     */
    public function __construct($text)
    {
        $this->setText($text);
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
     * @return string
     */
    public function getType()
    {
        return 'KbPositionText';
    }
}