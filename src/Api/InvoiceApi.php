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
use Ibrows\EasySysLibrary\Converter\Invoice\InvoiceConverter;

class InvoiceApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new InvoiceConverter();
    }

    /**
     * @param int $id
     * @return array
     */
    public function showPdfArray($id)
    {
        $append = '/' . (int)$id . '/pdf';
        return $this->connection->call($this->getResource() . $append);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'kb_invoice';
    }
}