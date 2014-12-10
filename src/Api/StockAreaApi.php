<?php

namespace Ibrows\EasySysLibrary\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\StockAreaConverter;

class StockAreaApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->converter = new StockAreaConverter();
        parent::__construct($connection);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'stock_place';
    }
}