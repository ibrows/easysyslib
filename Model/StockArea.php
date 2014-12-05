<?php

namespace Ibrows\EasySysLibrary\Model;

class StockArea
{
    /**
     * @var int Resource stock_location
     */
    protected $stockId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArticleType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}