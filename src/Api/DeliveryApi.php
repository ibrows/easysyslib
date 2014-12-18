<?php

namespace Ibrows\EasySysLibrary\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\ConverterInterface;
use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryConverter;
use Saxulum\HttpClient\Request;

class DeliveryApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);

        $this->converter = new DeliveryConverter();
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
     * @return string
     */
    protected function getType()
    {
        return 'kb_delivery';
    }
}