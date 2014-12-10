<?php

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Document;
use Ibrows\EasySysLibrary\Converter\Type\DateTime;
use Ibrows\EasySysLibrary\Converter\Type\Position\InvoicePositionConverter;
use Ibrows\EasySysLibrary\Converter\Type\ProxyConverter;

class InvoiceConverter extends AbstractConverter
{
    use Document;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\Invoice';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getDocumentMapping(),
            array(
                'total_received_payments'  => 'totalReceivedPayments', // float
                'total_credit_vouchers'    => 'totalCreditVouchers', // float
                'total_remaining_payments' => 'totalRemainingPayments', // float
                'is_valid_to'              => 'validTo', // date
                'network_link'             => 'networkLink', // string
            )
        );
    }

    /**
     * @return array
     */
    protected function setupConvertTypes()
    {
        return array_merge(
            $this->getDocumentTypes(),
            array(
                'is_valid_to' => new DateTime($this->getDefaultDateFormat(), $this->getDefaultTimeZone()),
                'taxs'        => new ProxyConverter(new InvoiceTaxConverter()),
                'positions'   => new InvoicePositionConverter()
            )
        );
    }
}