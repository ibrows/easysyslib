<?php

namespace Ibrows\EasySysLibrary\Model\Traits\Payment;

trait Payment
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var int
     */
    protected $bankAccount;

    /**
     * @var int
     */
    protected $paymentService;

    /**
     * @var bool
     */
    protected $isClientAccountRedemption;

    /**
     * @var bool
     */
    protected $isCashDiscount;

    /**
     * @var int
     */
    protected $kbInvoiceId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return int
     */
    public function getPaymentService()
    {
        return $this->paymentService;
    }

    /**
     * @param $paymentService
     */
    public function setPaymentService($paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * @return bool
     */
    public function getIsClientAccountRedemption()
    {
        return $this->isClientAccountRedemption;
    }

    /**
     * @param $isClientAccountRedemption
     */
    public function setIsClientAccountRedemption($isClientAccountRedemption)
    {
        $this->isClientAccountRedemption = $isClientAccountRedemption;
    }

    /**
     * @return bool
     */
    public function getIsCashDiscount()
    {
        return $this->isCashDiscount;
    }

    /**
     * @param $isCashDiscount
     */
    public function setIsCashDiscount($isCashDiscount)
    {
        $this->isCashDiscount = $isCashDiscount;
    }

    /**
     * @return int
     */
    public function getKbInvoiceId()
    {
        return $this->kbInvoiceId;
    }

    /**
     * @param int $kbInvoiceId
     */
    public function setKbInvoiceId($kbInvoiceId)
    {
        $this->kbInvoiceId = $kbInvoiceId;
    }
}