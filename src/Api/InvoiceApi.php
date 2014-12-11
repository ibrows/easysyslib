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
use Saxulum\HttpClient\Request;

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
        $append = DIRECTORY_SEPARATOR . (int)$id . DIRECTORY_SEPARATOR . 'pdf';

        return $this->connection->call($this->getResource() . $append);
    }

    /**
     * @param $id
     * @return array
     */
    public function issue($id)
    {
        $append = DIRECTORY_SEPARATOR . (int)$id . DIRECTORY_SEPARATOR . 'issue';

        return $this->connection->call($this->getResource() . $append, array(), array(), Request::METHOD_POST);
    }

    /**
     * @param $id
     * @return array
     */
    public function markAsSent($id)
    {
        $append = DIRECTORY_SEPARATOR . (int)$id . DIRECTORY_SEPARATOR . 'mark_as_sent';

        return $this->connection->call($this->getResource() . $append, array(), array(), Request::METHOD_POST);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'kb_invoice';
    }
}