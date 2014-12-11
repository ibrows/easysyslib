<?php

namespace Ibrows\EasySysLibrary\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoiceConverter;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePaymentConverter;
use Ibrows\EasySysLibrary\Converter\ConverterInterface;
use Ibrows\EasySysLibrary\Converter\Invoice\InvoicePositionDiscountConverter;
use Saxulum\HttpClient\Request;

class InvoiceApi extends AbstractApi
{
    /**
     * @var InvoicePaymentConverter
     */
    protected $invoicePaymentConverter;

    /**
     * @var InvoicePaymentConverter
     */
    protected $invoicePositionDiscountConverter;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);

        $this->converter = new InvoiceConverter();
        $this->invoicePaymentConverter = new InvoicePaymentConverter();
        $this->invoicePositionDiscountConverter = new InvoicePositionDiscountConverter();
    }

    /**
     * @return ConverterInterface[]
     */
    protected function getConverters()
    {
        $converters = array();
        $converters[] = $this->converter;
        $converters[] = $this->invoicePaymentConverter;
        $converters[] = $this->invoicePositionDiscountConverter;

        return $converters;
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
     * @param $invoiceId
     * @param $value
     * @param null $bankAccountId
     * @param null $date
     * @param null $paymentServiceId
     * @return array
     */
    public function createPayment($invoiceId, $value, $bankAccountId = null, $date = null, $paymentServiceId = null)
    {
        $postParams = $this->createPaymentPostParams($value, $bankAccountId, $date, $paymentServiceId);
        $dataEasySys = $this->connection->call($this->getCreatePaymentResource($invoiceId), array(), $postParams, Request::METHOD_POST);
        $this->invoicePaymentConverter->setDataEasySys($dataEasySys);
        $payment = $this->invoicePaymentConverter->getObject();

        return $payment;
    }

    /**
     * @param $invoiceId
     * @param $value
     * @param null $percentual
     * @param null $text
     * @return object
     */
    public function createPositionDiscount($invoiceId, $value, $percentual = null, $text = null)
    {
        $postParams = $this->createPositionDiscountPostParams($value, $percentual, $text);
        $dataEasySys = $this->connection->call($this->getCreatePositionDiscountResource($invoiceId), array(), $postParams, Request::METHOD_POST);
        $this->invoicePositionDiscountConverter->setDataEasySys($dataEasySys);
        $discount = $this->invoicePositionDiscountConverter->getObject();

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
     * @param $value
     * @param null $bankAccountId
     * @param null $date
     * @param null $paymentServiceId
     * @return array
     */
    public function createPaymentPostParams($value, $bankAccountId = null, $date = null, $paymentServiceId = null)
    {
        $params = array(
            'value'              => $value,
            'date'               => $date,
            'bank_account_id'    => $bankAccountId,
            'payment_service_id' => $paymentServiceId
        );

        return $params;
    }

    /**
     * @param $invoiceId
     * @return string
     */
    protected function getCreatePaymentResource($invoiceId)
    {
        return '/' . $this->getType() . '/' . (int)$invoiceId . '/payment';
    }

    /**
     * @param $invoiceId
     * @return string
     */
    protected function getCreatePositionDiscountResource($invoiceId)
    {
        return '/' . $this->getType() . '/' . (int)$invoiceId . '/kb_position_discount';
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'kb_invoice';
    }
}