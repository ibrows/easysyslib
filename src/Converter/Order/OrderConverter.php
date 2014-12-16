<?php

namespace Ibrows\EasySysLibrary\Converter\Order;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Document;
use Ibrows\EasySysLibrary\Converter\Type\Position\OrderPositionConverter;
use Ibrows\EasySysLibrary\Converter\Type\ProxyConverter;

/**
 * @see https://docs.easysys.ch/ressources/kb_order/#show-order
 */
class OrderConverter extends AbstractConverter
{
    use Document;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Order\Order';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getDocumentMapping(),
            array(
                'is_compact_view'         => 'compactView', // bool
                'contact_address_manual'  => 'contactAddressManual', // string (500)
                'show_position_taxes'     => 'showPositionTaxes', // bool
                'delivery_address_type'   => 'deliveryAddressType', // int
                'delivery_address'        => 'deliveryAddress', // string
                'delivery_address_manual' => 'deliveryAddressManual', // string (500)
                'is_recurring'            => 'recurring', // bool
                'nb_decimals_amount'      => 'nbDecimalsAmount', // int
                'nb_decimals_price'       => 'nbDecimalsPrice', // int
                'network_link'            => 'networkLink' // string
            )
        );
    }

    /**
     * @return array|null
     */
    protected function setupConvertTypes()
    {
        return array_merge(
            $this->getDocumentTypes(),
            array(
                'taxs'      => new ProxyConverter(new OrderTaxConverter()),
                'positions' => new OrderPositionConverter()
            )
        );
    }
}