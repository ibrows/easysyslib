<?php

namespace Ibrows\EasySysLibrary\Converter\Order;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Type\DateTime;
use Ibrows\EasySysLibrary\Converter\Type\Position\OrderPositionConverter;
use Ibrows\EasySysLibrary\Converter\Type\ProxyConverter;

/**
 * @see https://docs.easysys.ch/ressources/kb_order/#show-order
 */
class OrderConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order\Order';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'                      => 'id', // int
        'document_nr'             => 'documentNumber', // string
        'title'                   => 'title', // string
        'contact_id'              => 'contactId', // int
        'contact_sub_id'          => 'contactSubId', // int
        'user_id'                 => 'userId', // int
        'project_id'              => 'projectId', // int
        'logopaper_id'            => 'logopaperId', // int
        'language_id'             => 'languageId', // int
        'bank_account_id'         => 'bankAccountId', // int
        'currency_id'             => 'currencyId', // int
        'payment_type_id'         => 'paymentTypeId', // int
        'header'                  => 'header', // string
        'footer'                  => 'footer', // string
        'total_gross'             => 'totalGross', // float
        'total_net'               => 'totalNet', // float
        'total_taxes'             => 'totalTaxes', // float
        'total'                   => 'total', // float
        'mwst_type'               => 'mwstType', // int
        'mwst_is_net'             => 'mwstNet', // bool
        'is_valid_from'           => 'validFrom', // date
        'is_compact_view'         => 'compactView', // bool
        'contact_address_manual'  => 'contactAddressManual', // string (500)
        'show_position_taxes'     => 'showPositionTaxes', // bool
        'contact_address'         => 'contactAddress', // string
        'delivery_address_type'   => 'deliveryAddressType', // int
        'delivery_address'        => 'deliveryAddress', // string
        'delivery_address_manual' => 'deliveryAddressManual', // string (500)
        'kb_item_status_id'       => 'kbItemStatusId', // int
        'is_recurring'            => 'recurring', // bool
        'api_reference'           => 'apiReference', // string
        'viewed_by_client_at'     => 'viewedByClientAt', // datetime
        'updated_at'              => 'updatedAt', // datetime
        'taxs'                    => 'tax', // OrderTax[]
        'positions'               => 'positions', // OrderPosition[]
        'nb_decimals_amount'      => 'nbDecimalsAmount', // int
        'nb_decimals_price'       => 'nbDecimalsPrice', // int
    );

    /**
     * @return array|null
     */
    protected function setupConvertTypes()
    {
        return array(
            'viewed_by_client_at' => new DateTime($this->getDefaultDateTimeFormat(), $this->getDefaultTimeZone()),
            'updated_at'          => new DateTime($this->getDefaultDateTimeFormat(), $this->getDefaultTimeZone()),
            'is_valid_from'       => new DateTime($this->getDefaultDateFormat(), $this->getDefaultTimeZone()),
            'taxs'                => new ProxyConverter(new OrderTaxConverter()),
            'positions'           => new OrderPositionConverter()
        );
    }
}