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
use Ibrows\EasySysLibrary\Converter\Invoice\InvoiceConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderConverter;
use Ibrows\EasySysLibrary\Converter\Delivery\DeliveryConverter;
use Ibrows\EasySysLibrary\Converter\Order\OrderPositionDiscountConverter;
use Ibrows\EasySysLibrary\Model\Delivery\Delivery;
use Ibrows\EasySysLibrary\Model\Invoice\Invoice;
use Ibrows\EasySysLibrary\Model\Order\Order;
use Ibrows\EasySysLibrary\Model\Order\OrderPosition;
use Ibrows\EasySysLibrary\Model\AmountInterface;
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
     * @var ConverterInterface
     */
    protected $deliveryCreateConverter;

    /**
     * @var ConverterInterface
     */
    protected $orderPositionDiscountConverter;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new OrderConverter();
        $this->invoiceCreateConverter = new InvoiceConverter();
        $this->deliveryCreateConverter = new DeliveryConverter();
        $this->orderPositionDiscountConverter = new OrderPositionDiscountConverter();
    }

    /**
     * @param $orderId
     * @param $value
     * @param null $percentual
     * @param null $text
     * @return object
     */
    public function createPositionDiscount($orderId, $value, $percentual = null, $text = null)
    {
        $postParams = $this->createPositionDiscountPostParams($value, $percentual, $text);
        $dataEasySys = $this->connection->call($this->getCreatePositionDiscountResource($orderId), array(), $postParams, Request::METHOD_POST);
        $this->getOrderPositionDiscountConverter()->setDataEasySys($dataEasySys);
        $discount = $this->getOrderPositionDiscountConverter()->getObject();

        return $discount;
    }

    /**
     * @param $value
     * @param null $percentual
     * @param null $text
     * @return array
     */
    public function createPositionDiscountPostParams($value, $percentual = null, $text = null)
    {
        $params = array(
            'value'         => $value,
            'is_percentual' => $percentual,
            'text'          => $text
        );

        return $params;
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
     * @return Delivery
     */
    public function createDeliveryObject(Order $order)
    {
        return $this->createDeliveryWithPositionsObject($order, $order->getPositions());
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
            $amount = $position instanceof AmountInterface ? $position->getAmount() : null;
            $positionData[] = $this->getCreateInvoicePosition($position->getId(), $position->getType(), $amount);
        }

        $postParams = $this->getCreateInvoicePostParams($positionData);

        $dataEasySys = $this->createInvoice($order->getId(), $postParams);
        $this->invoiceCreateConverter->setDataEasySys($dataEasySys);
        return $this->invoiceCreateConverter->getObject();
    }

    /**
     * @param Order $order
     * @param OrderPosition[] $positions
     * @return Invoice
     */
    public function createDeliveryWithPositionsObject(Order $order, array $positions)
    {
        $positionData = array();

        foreach ($positions as $position) {
            $amount = $position instanceof AmountInterface ? $position->getAmount() : null;
            $positionData[] = $this->getCreateDeliveryPosition($position->getId(), $position->getType(), $amount);
        }

        $postParams = $this->getCreateDeliveryPostParams($positionData);

        $dataEasySys = $this->createDelivery($order->getId(), $postParams);
        $this->deliveryCreateConverter->setDataEasySys($dataEasySys);
        return $this->deliveryCreateConverter->getObject();
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
     * @param $orderPositionId
     * @param null $amount
     * @return array
     */
    public function getCreateDeliveryPosition($orderPositionId, $orderPositionType, $amount = null)
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
     * @param array $positions
     * @return array
     */
    public function getCreateDeliveryPostParams(array $positions)
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
     * @param int $orderId
     * @param array $postParams
     * @return array
     */
    public function createDelivery($orderId, array $postParams)
    {
        return $this->call($this->getCreateDeliveryResource($orderId), array(), $postParams, Request::METHOD_POST);
    }

    /**
     * @param int $contactId
     * @return Order
     */
    public function getModelInstance($contactId)
    {
        $converter = $this->getConverter();
        $converter->setDataEasySys($this->addDefaults());

        /** @var Order $order */
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
     * @return ConverterInterface
     */
    public function getOrderPositionDiscountConverter()
    {
        return $this->orderPositionDiscountConverter;
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
        $converters[] = $this->getOrderPositionDiscountConverter();
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
     * @param int $orderId
     * @return string
     */
    protected function getCreateDeliveryResource($orderId)
    {
        return '/' . $this->getType() . '/' . (int)$orderId . '/delivery';
    }

    /**
     * @param $orderId
     * @return string
     */
    protected function getCreatePositionDiscountResource($orderId)
    {
        return '/' . $this->getType() . '/' . (int)$orderId . '/kb_position_discount';
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
        unset($data['network_link']);
        return $data;
    }
}