<?php

namespace Ibrows\EasySysLibrary\Converter\Traits\Position;

trait DiscountPosition
{
    /**
     * @return array
     */
    protected function getDiscountPositionMapping()
    {
        return array(
            'value'          => 'value',
            'is_percentual'  => 'percentual',
            'discount_total' => 'discountTotal',
        );
    }
}