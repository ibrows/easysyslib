<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 11:06
 */

namespace Ibrows\EasySysLibrary\Model\Invoice;

use Ibrows\EasySysLibrary\Model\Traits\Document;

class Invoice
{
    use Document;

    /**
     * @var float
     */
    protected $totalReceivedPayments;

    /**
     * @var float
     */
    protected $totalCreditVouchers;

    /**
     * @var float
     */
    protected $totalRemainingPayments;

    /**
     * @var \DateTime
     */
    protected $validTo;

    /**
     * @var string
     */
    protected $networkLink;

    /**
     * @var bool
     */
    protected $showPositionTaxes;

    /**
     * @return string
     */
    public function getNetworkLink()
    {
        return $this->networkLink;
    }

    /**
     * @param string $networkLink
     */
    public function setNetworkLink($networkLink)
    {
        $this->networkLink = $networkLink;
    }

    /**
     * @return float
     */
    public function getTotalCreditVouchers()
    {
        return $this->totalCreditVouchers;
    }

    /**
     * @param float $totalCreditVouchers
     */
    public function setTotalCreditVouchers($totalCreditVouchers)
    {
        $this->totalCreditVouchers = $totalCreditVouchers;
    }

    /**
     * @return float
     */
    public function getTotalReceivedPayments()
    {
        return $this->totalReceivedPayments;
    }

    /**
     * @param float $totalReceivedPayments
     */
    public function setTotalReceivedPayments($totalReceivedPayments)
    {
        $this->totalReceivedPayments = $totalReceivedPayments;
    }

    /**
     * @return float
     */
    public function getTotalRemainingPayments()
    {
        return $this->totalRemainingPayments;
    }

    /**
     * @param float $totalRemainingPayments
     */
    public function setTotalRemainingPayments($totalRemainingPayments)
    {
        $this->totalRemainingPayments = $totalRemainingPayments;
    }

    /**
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * @param \DateTime $validTo
     */
    public function setValidTo(\DateTime $validTo = null)
    {
        $this->validTo = $validTo;
    }

    /**
     * @return boolean
     */
    public function isShowPositionTaxes()
    {
        return $this->showPositionTaxes;
    }

    /**
     * @param boolean $showPositionTaxes
     */
    public function setShowPositionTaxes($showPositionTaxes)
    {
        $this->showPositionTaxes = $showPositionTaxes;
    }
}