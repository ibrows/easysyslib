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
use Ibrows\EasySysLibrary\Converter\Tax\TaxConverter;

class TaxApi extends AbstractApi
{
    /**
     * @see https://docs.easysys.ch/ressources/kb_invoice/#create-invoice (mwst_type)
     */
    const TAX_TYPE_INCLUDING = 0;
    const TAX_TYPE_EXCLUDING = 1;
    const TAX_TYPE_EXEMPT = 2;

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