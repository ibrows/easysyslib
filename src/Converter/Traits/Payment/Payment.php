<?php

namespace Ibrows\EasySysLibrary\Converter\Traits\Payment;

trait Payment
{
    /**
     * @return array
     */
    protected function getPaymentMapping()
    {
        return array(
            'id'                           => 'id', // int
            'date'                         => 'date', // DateTime
            'value'                        => 'value', // int
            'bank_account_id'              => 'bankAccount', // int
            'title'                        => 'title', // int
            'payment_service_id'           => 'paymentService', // bool
            'is_client_account_redemption' => 'isClientAccountRedemption', // string
            'is_cash_discount'             => 'isCashDiscount', // string
        );
    }
}