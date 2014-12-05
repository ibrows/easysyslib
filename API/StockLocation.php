<?php

namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\StockLocationConverter;

class StockLocation extends AbstractAPI
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new StockLocationConverter();
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'stock';
    }
}