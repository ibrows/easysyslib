<?php

namespace Ibrows\EasySysLibrary\Model\Stock;

class StockArea
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int Resource stock_location
     */
    protected $stockId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * @return int
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * @param int $stockId
     * @return $this
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;

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
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

    }
}