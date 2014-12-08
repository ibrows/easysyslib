<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:31
 */

namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\TaxConverter;

class Tax extends AbstractAPI
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new TaxConverter();
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'tax';
    }
} 