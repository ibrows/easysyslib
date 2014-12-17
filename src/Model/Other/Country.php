<?php

namespace Ibrows\EasySysLibrary\Model\Other;

class Country
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
     * @var string
     */
    protected $nameShort;

    /**
     * @var string
     */
    protected $iso3166Alpha2;

    /**
     * @param string $name
     * @param string $nameShort
     * @param string $iso3166Alpha2
     */
    public function __construct($name, $nameShort, $iso3166Alpha2)
    {
        $this->name = $name;
        $this->nameShort = $nameShort;
        $this->iso3166Alpha2 = $iso3166Alpha2;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Country
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameShort()
    {
        return $this->nameShort;
    }

    /**
     * @param string $nameShort
     * @return Country
     */
    public function setNameShort($nameShort)
    {
        $this->nameShort = $nameShort;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso3166Alpha2()
    {
        return $this->iso3166Alpha2;
    }

    /**
     * @param string $iso3166Alpha2
     * @return Country
     */
    public function setIso3166Alpha2($iso3166Alpha2)
    {
        $this->iso3166Alpha2 = $iso3166Alpha2;
        return $this;
    }
}