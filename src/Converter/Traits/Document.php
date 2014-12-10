<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:52
 */

namespace Ibrows\EasySysLibrary\Converter\Traits;

use Ibrows\EasySysLibrary\Converter\Type\DateTime;

trait Document
{
    /**
     * @return array
     */
    protected function getDocumentMapping()
    {
        return array(
            'id'                  => 'id', // int
            'document_nr'         => 'documentNumber', // string
            'title'               => 'title', // string
            'contact_id'          => 'contactId', // int
            'contact_sub_id'      => 'contactSubId', // int
            'user_id'             => 'userId', // int
            'project_id'          => 'projectId', // int
            'logopaper_id'        => 'logopaperId', // int
            'language_id'         => 'languageId', // int
            'bank_account_id'     => 'bankAccountId', // int
            'currency_id'         => 'currencyId', // int
            'payment_type_id'     => 'paymentTypeId', // int
            'header'              => 'header', // string
            'footer'              => 'footer', // string
            'total_gross'         => 'totalGross', // float
            'total_net'           => 'totalNet', // float
            'total_taxes'         => 'totalTaxes', // float
            'total'               => 'total', // float
            'mwst_type'           => 'mwstType', // int
            'mwst_is_net'         => 'mwstNet', // bool
            'is_valid_from'       => 'validFrom', // date
            'contact_address'     => 'contactAddress', // string
            'kb_item_status_id'   => 'kbItemStatusId', // int
            'api_reference'       => 'apiReference', // string
            'viewed_by_client_at' => 'viewedByClientAt', // datetime
            'updated_at'          => 'updatedAt', // datetime
            'taxs'                => 'tax',
            'positions'           => 'positions',
        );
    }

    /**
     * @return array
     */
    protected function getDocumentTypes()
    {
        return array(
            'viewed_by_client_at' => new DateTime($this->getDefaultDateTimeFormat(), $this->getDefaultTimeZone()),
            'updated_at'          => new DateTime($this->getDefaultDateTimeFormat(), $this->getDefaultTimeZone()),
            'is_valid_from'       => new DateTime($this->getDefaultDateFormat(), $this->getDefaultTimeZone()),
        );
    }

    /**
     * @return string
     */
    abstract protected function getDefaultDateTimeFormat();

    /**
     * @return string
     */
    abstract protected function getDefaultTimeZone();

    /**
     * @return string
     */
    abstract protected function getDefaultDateFormat();
} 