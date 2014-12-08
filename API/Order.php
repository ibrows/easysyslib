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
use Ibrows\EasySysLibrary\Converter\OrderConverter;

class Order extends AbstractAPI
{
    /**
     * Use invoice as delivery
     */
    const DELIVERY_TYPE_INVOICE = 0;

    /**
     * Use own delivery address
     */
    const DELIVERY_TYPE_OWN = 1;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new OrderConverter();
    }

    /**
     * @param array $data native data sent to api
     * @param string $type
     * @param bool $includeUserId
     * @return array
     */
    public function create(array $data, $type = null, $includeUserId = true)
    {
        return parent::create($this->cleanDataForEasysys($data), $type, $includeUserId);
    }

    /**
     * @param int $id native data sent to api
     * @param array $data
     * @param string $type
     * @return array
     */
    public function update($id, array $data, $type = null)
    {
        return parent::update($id, $this->cleanDataForEasysys($data), $type);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'kb_order';
    }

    /**
     * @param array $data
     * @return array
     */
    protected function cleanDataForEasysys(array $data = array())
    {
        unset($data['document_nr']);
        unset($data['total_gross']);
        unset($data['total_net']);
        unset($data['total_taxes']);
        unset($data['total']);
        unset($data['contact_address']);
        unset($data['delivery_address']);
        unset($data['kb_item_status_id']);
        unset($data['is_recurring']);
        unset($data['updated_at']);
        return $data;
    }
}