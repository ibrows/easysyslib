<?php

namespace Ibrows\EasySysLibrary\Converter;

/**
 * @see https://docs.easysys.ch/ressources/kb_order/#show-order
 */
class OrderConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'                    => 'id', // int
        'document_nr'           => 'documentNr', // string
        'title'                 => 'title', // string
        'contact_id'            => 'contactId', // int
        'contact_sub_id'        => 'contactSubId', // int
        'user_id'               => 'userId', // int
        'project_id'            => 'projectId', // int
        'logopaper_id'          => 'logopaperId', // int
        'language_id'           => 'languageId', // int
        'bank_account_id'       => 'bankAccountId', // int
        'currency_id'           => 'currencyId', // int
        'payment_type_id'       => 'paymentTypeId', // int
        'header'                => 'header', // string
        'footer'                => 'footer', // string
        'total_gross'           => 'totalGross', // float
        'total_net'             => 'totalNet', // float
        'total_taxes'           => 'totalTaxes', // float
        'total'                 => 'total', // float
        'mwst_type'             => 'mwstType', // int
        'mwst_is_net'           => 'mwstIsNet', // bool
        'is_valid_from'         => 'isValidFrom', // date
        'contact_address'       => 'contactAddress', // string
        'delivery_address_type' => 'deliveryAddressType', // int
        'delivery_address'      => 'deliveryAddress', // string
        'kb_item_status_id'     => 'kbItemStatusId', // int
        'is_recurring'          => 'isRecurring', // bool
        'api_reference'         => 'apiReference', // string
        'viewed_by_client_at'   => 'viewedByClientAt', // datetime
        'updated_at'            => 'updatedAt', // datetime
    );
}