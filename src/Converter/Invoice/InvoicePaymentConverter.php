<?php

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Payment\Payment;
use Ibrows\EasySysLibrary\Converter\Type\DateTime;

class InvoicePaymentConverter extends AbstractConverter
{
    use Payment;

    /**
     * @see https://docs.easysys.ch/ressources/kb_invoice/#show-payments
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\InvoicePayment';

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return $this->getPaymentMapping();
    }

    /**
     * @return array|null
     */
    protected function setupConvertTypes()
    {
        return array(
            'date'   => new DateTime($this->getDefaultDateFormat(), $this->getDefaultTimeZone()),
        );
    }
} 