<?php

namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\StockAreaConverter;

class StockArea extends AbstractAPI
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new StockAreaConverter();
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'stock_place';
    }
}