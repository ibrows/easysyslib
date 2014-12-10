<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 * 
 * User: mikemeier
 * Date: 10.12.14
 * Time: 20:25
 */

namespace Ibrows\EasySysLibrary\Model\Traits\Position;

trait Position
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $optional;

    /**
     * @var int
     */
    protected $parentId;

    /**
     * @var int
     */
    protected $internalPosition;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string (5000)
     */
    protected $text;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getInternalPosition()
    {
        return $this->internalPosition;
    }

    /**
     * @param int $internalPosition
     */
    public function setInternalPosition($internalPosition)
    {
        $this->internalPosition = $internalPosition;
    }

    /**
     * @return boolean
     */
    public function isOptional()
    {
        return $this->optional;
    }

    /**
     * @param boolean $optional
     */
    public function setOptional($optional)
    {
        $this->optional = $optional;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param string $type
     * @throws \Exception
     */
    public function setType($type)
    {
        if ($type !== $this->getType()) {
            throw new \Exception("Cannot switch my class to " . $type);
        }
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    abstract public function getType();
} 