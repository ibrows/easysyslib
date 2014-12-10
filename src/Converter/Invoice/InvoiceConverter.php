<?php

namespace Ibrows\EasySysLibrary\Converter\Invoice;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

class InvoiceConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Invoice\Invoice';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'                       => 'id', // int
        'document_nr'              => 'documentNumber', // string
        'title'                    => 'title', // string
        'contact_id'               => 'contactId', // int
        'contact_sub_id'           => 'contactSubId', // int
        'user_id'                  => 'userId', // int
        'project_id'               => 'projectId', // int
        'logopaper_id'             => 'logopaperId', // int
        'language_id'              => 'languageId', // int
        'bank_account_id'          => 'bankAccountId', // int
        'currency_id'              => 'currencyId', // int
        'payment_type_id'          => 'paymentTypeId', // int
        'header'                   => 'header', // string
        'footer'                   => 'footer', // string
        'total_gross'              => 'totalGross', // float
        'total_net'                => 'totalNet', // float
        'total_taxes'              => 'totalTaxes', // float
        'total_received_payments'  => 'totalReceivedPayments', // float
        'total_credit_vouchers'    => 'totalCreditVouchers', // float
        'total_remaining_payments' => 'totalRemainingPayments', // float
        'total'                    => 'total', // float
        'mwst_type'                => 'mwstType', // int
        'mwst_is_net'              => 'mwstNet', // bool
        'is_valid_from'            => 'validFrom', // date
        'is_valid_to'              => 'validTo', // date
        'contact_address'          => 'contactAddress', // string
        'kb_item_status_id'        => 'kbItemStatusId', // int
        'api_reference'            => 'apiReference', // string
        'viewed_by_client_at'      => 'viewedByClientAt', // datetime
        'updated_at'               => 'updatedAt', // datetime
        'taxs'                     => 'tax', // InvoiceTax[]
        'positions'                => 'positions', // InvoicePosition[]
        'network_link'             => 'networkLink', // int
    );
}