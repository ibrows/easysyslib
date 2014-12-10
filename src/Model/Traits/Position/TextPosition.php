<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 20:27
 */

namespace Ibrows\EasySysLibrary\Model\Traits\Position;

trait TextPosition
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

    /**
     * @param string $text
     */
    abstract protected function setText($text);
} 