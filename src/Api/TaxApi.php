<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:31
 */

namespace Ibrows\EasySysLibrary\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\TaxConverter;

class TaxApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->converter = new TaxConverter();
        parent::__construct($connection);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'tax';
    }
} 