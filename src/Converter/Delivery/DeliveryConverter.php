<?php

namespace Ibrows\EasySysLibrary\Converter\Delivery;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Traits\Document;
use Ibrows\EasySysLibrary\Converter\Type\Position\DeliveryPositionConverter;
use Ibrows\EasySysLibrary\Converter\Type\ProxyConverter;

class DeliveryConverter extends AbstractConverter
{
    use Document;

    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Delivery\Delivery';

    /**
     * @return array
     */
    protected function setupMapping()
    {
        return array_merge(
            $this->getDocumentMapping(),
            array(
                'delivery_address_type' => 'deliveryAddressType', // int
                'delivery_address'      => 'deliveryAddress'
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
                'taxs'      => new ProxyConverter(new DeliveryTaxConverter()),
                'positions' => new DeliveryPositionConverter()
            )
        );
    }
}