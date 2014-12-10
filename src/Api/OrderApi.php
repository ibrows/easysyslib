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
use Ibrows\EasySysLibrary\Converter\ConverterInterface;
use Ibrows\EasySysLibrary\Converter\InvoiceConverter;
use Ibrows\EasySysLibrary\Converter\OrderConverter;
use Ibrows\EasySysLibrary\Model\Invoice;
use Ibrows\EasySysLibrary\Model\Order;
use Ibrows\EasySysLibrary\Model\OrderPosition;
use Ibrows\EasySysLibrary\Model\OrderPositionAmountInterface;
use Saxulum\HttpClient\Request;

class OrderApi extends AbstractApi
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
     * @var ConverterInterface
     */
    protected $invoiceCreateConverter;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new OrderConverter();
        $this->invoiceCreateConverter = new InvoiceConverter();
    }

    /**
     * @param Order $order
     * @return Invoice
     */
    public function createInvoiceObject(Order $order)
    {
        return $this->createInvoiceWithPositionsObject($order, $order->getPositions());
    }

    /**
     * @param Order $order
     * @param OrderPosition[] $positions
     * @return Invoice
     */
    public function createInvoiceWithPositionsObject(Order $order, array $positions)
    {
        $positionData = array();

        foreach ($positions as $position) {
            $amount = $position instanceof OrderPositionAmountInterface ? $position->getAmount() : null;
            $positionData[] = $this->getCreateInvoicePosition($position->getId(), $position->getType(), $amount);
        }

        $postParams = $this->getCreateInvoicePostParams($positionData);

        $dataEasySys = $this->createInvoice($order->getId(), $postParams);
        $this->invoiceCreateConverter->setDataEasySys($dataEasySys);
        return $this->invoiceCreateConverter->getObject();
    }

    /**
     * @param int $orderPositionId
     * @param string $orderPositionType
     * @param int|null $amount
     * @return array
     */
    public function getCreateInvoicePosition($orderPositionId, $orderPositionType, $amount = null)
    {
        $data = array(
            'id'   => $orderPositionId,
            'type' => $orderPositionType
        );
        if ($amount) {
            $data['amount'] = $amount;
        }
        return $data;
    }

    /**
     * @param array $positions
     * @return array
     */
    public function getCreateInvoicePostParams(array $positions)
    {
        return array('positions' => $positions);
    }

    /**
     * @param int $orderId
     * @param array $postParams
     * @return array
     */
    public function createInvoice($orderId, array $postParams)
    {
        return $this->call($this->getCreateInvoiceResource($orderId), array(), $postParams, Request::METHOD_POST);
    }

    /**
     * @param int $contactId
     * @return \Ibrows\EasySysLibrary\Model\Order
     */
    public function getModelInstance($contactId)
    {
        $converter = $this->getConverter();
        $converter->setDataEasySys($this->addDefaults());

        /** @var \Ibrows\EasySysLibrary\Model\Order $order */
        $order = $converter->getObject();
        $order->setContactId($contactId);

        return $order;
    }

    /**
     * @return ConverterInterface
     */
    public function getInvoiceCreateConverter()
    {
        return $this->invoiceCreateConverter;
    }

    /**
     * @param ConverterInterface $invoiceCreateConverter
     */
    public function setInvoiceCreateConverter(ConverterInterface $invoiceCreateConverter = null)
    {
        $this->invoiceCreateConverter = $invoiceCreateConverter;
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
     * @return ConverterInterface[]
     */
    protected function getConverters()
    {
        $converters = parent::getConverters();
        $converters[] = $this->getInvoiceCreateConverter();
        return $converters;
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
     * @param int $orderId
     * @return string
     */
    protected function getCreateInvoiceResource($orderId)
    {
        return '/' . $this->getType() . '/' . (int)$orderId . '/invoice';
    }

    /**
     * @param array $data
     * @return array
     */
    protected function addDefaults(array $data = array())
    {
        return $data;
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