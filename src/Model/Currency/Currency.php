<?php

namespace Ibrows\EasySysLibrary\Model\Currency;

class Currency
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $roundFactor;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getRoundFactor()
    {
        return $this->roundFactor;
    }

    /**
     * @param float $roundFactor
     */
    public function setRoundFactor($roundFactor)
    {
        $this->roundFactor = $roundFactor;
    }
} 