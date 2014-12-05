<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 11:26
 */

namespace Ibrows\EasySysLibrary\Model;

class Order
{
    /**
     * @var int
     */
    protected $contactId;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string (80)
     * This field can only be read and edited by the api. It can be used to save references to other systems.
     */
    protected $apiReference;

    /**
     * @var int
     */
    protected $bankAccountId;

    /**
     * @var int
     */
    protected $contactAddressId;

    /**
     * @var string (500)
     */
    protected $contactAddressManual;

    /**
     * @var string
     */
    protected $contactSubId;

    /**
     * @var string
     */
    protected $currencyId;

    /**
     * @var int
     */
    protected $deliveryAddressId;

    /**
     * @var string (500)
     */
    protected $deliveryAddressManual;

    /**
     * @var int
     */
    protected $deliveryAddressType;

    /**
     * @var string (4000)
     */
    protected $footer;

    /**
     * @var string (4000)
     */
    protected $header;

    /**
     * @var bool
     */
    protected $isCompactView;

    /**
     * @var \DateTime (converted to yyyy-mm-dd)
     */
    protected $isValidFrom;

    /**
     * @var int
     */
    protected $languageId;

    /**
     * @var int
     */
    protected $logopaperId;

    /**
     * @var bool
     *
     * This value affects the total if the field mwst_type has been set to 0.
     * false = Taxes are included in the total
     * true = Taxes will be added to the total
     */
    protected $mwstIsNet;

    /**
     * @var int
     *
     * Possible values
     * 0 = including taxes
     * 1 = excluding taxes
     * 2 = exempt from taxes
     */
    protected $mwstType;

    /**
     * @var int
     */
    protected $nbDecimalsAmount;

    /**
     * @var int
     */
    protected $nbDecimalsPrice;

    /**
     * @var int
     */
    protected $paymentTypeId;

    /**
     * @var int
     */
    protected $prProjectId;

    /**
     * @var bool
     */
    protected $showPositionTaxes;

    /**
     * @var string (2000)
     */
    protected $termsOfPaymentText;

    /**
     * @var string (80)
     */
    protected $title;

    /**
     * @var OrderPosition[]
     */
    protected $positions = array();

    /**
     * @param int $contactId
     * @param int $userId
     */
    public function __construct($contactId, $userId)
    {
        $this->contactId = $contactId;
        $this->userId = $userId;
    }

    /**
     * @param OrderPosition $orderPosition
     */
    public function addPosition(OrderPosition $orderPosition)
    {
        $this->positions[] = $orderPosition;
    }

    /**
     * @param OrderPosition $orderPosition
     */
    public function removePosition(OrderPosition $orderPosition)
    {
        foreach (array_keys($this->positions, $orderPosition) as $key) {
            unset($this->positions[$key]);
        }
    }

    /**
     * @return string
     */
    public function getApiReference()
    {
        return $this->apiReference;
    }

    /**
     * @param string $apiReference
     */
    public function setApiReference($apiReference)
    {
        $this->apiReference = $apiReference;
    }

    /**
     * @return int
     */
    public function getBankAccountId()
    {
        return $this->bankAccountId;
    }

    /**
     * @param int $bankAccountId
     */
    public function setBankAccountId($bankAccountId)
    {
        $this->bankAccountId = $bankAccountId;
    }

    /**
     * @return int
     */
    public function getContactAddressId()
    {
        return $this->contactAddressId;
    }

    /**
     * @param int $contactAddressId
     */
    public function setContactAddressId($contactAddressId)
    {
        $this->contactAddressId = $contactAddressId;
    }

    /**
     * @return string
     */
    public function getContactAddressManual()
    {
        return $this->contactAddressManual;
    }

    /**
     * @param string $contactAddressManual
     */
    public function setContactAddressManual($contactAddressManual)
    {
        $this->contactAddressManual = $contactAddressManual;
    }

    /**
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param int $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * @return string
     */
    public function getContactSubId()
    {
        return $this->contactSubId;
    }

    /**
     * @param string $contactSubId
     */
    public function setContactSubId($contactSubId)
    {
        $this->contactSubId = $contactSubId;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return int
     */
    public function getDeliveryAddressId()
    {
        return $this->deliveryAddressId;
    }

    /**
     * @param int $deliveryAddressId
     */
    public function setDeliveryAddressId($deliveryAddressId)
    {
        $this->deliveryAddressId = $deliveryAddressId;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressManual()
    {
        return $this->deliveryAddressManual;
    }

    /**
     * @param string $deliveryAddressManual
     */
    public function setDeliveryAddressManual($deliveryAddressManual)
    {
        $this->deliveryAddressManual = $deliveryAddressManual;
    }

    /**
     * @return int
     */
    public function getDeliveryAddressType()
    {
        return $this->deliveryAddressType;
    }

    /**
     * @param int $deliveryAddressType
     */
    public function setDeliveryAddressType($deliveryAddressType)
    {
        $this->deliveryAddressType = $deliveryAddressType;
    }

    /**
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param string $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return boolean
     */
    public function isIsCompactView()
    {
        return $this->isCompactView;
    }

    /**
     * @param boolean $isCompactView
     */
    public function setIsCompactView($isCompactView)
    {
        $this->isCompactView = $isCompactView;
    }

    /**
     * @return \DateTime
     */
    public function getIsValidFrom()
    {
        return $this->isValidFrom;
    }

    /**
     * @param \DateTime $isValidFrom
     */
    public function setIsValidFrom(\DateTime $isValidFrom = null)
    {
        $this->isValidFrom = $isValidFrom;
    }

    /**
     * @return int
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param int $languageId
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
    }

    /**
     * @return int
     */
    public function getLogopaperId()
    {
        return $this->logopaperId;
    }

    /**
     * @param int $logopaperId
     */
    public function setLogopaperId($logopaperId)
    {
        $this->logopaperId = $logopaperId;
    }

    /**
     * @return boolean
     */
    public function isMwstIsNet()
    {
        return $this->mwstIsNet;
    }

    /**
     * @param boolean $mwstIsNet
     */
    public function setMwstIsNet($mwstIsNet)
    {
        $this->mwstIsNet = $mwstIsNet;
    }

    /**
     * @return int
     */
    public function getMwstType()
    {
        return $this->mwstType;
    }

    /**
     * @param int $mwstType
     */
    public function setMwstType($mwstType)
    {
        $this->mwstType = $mwstType;
    }

    /**
     * @return int
     */
    public function getNbDecimalsAmount()
    {
        return $this->nbDecimalsAmount;
    }

    /**
     * @param int $nbDecimalsAmount
     */
    public function setNbDecimalsAmount($nbDecimalsAmount)
    {
        $this->nbDecimalsAmount = $nbDecimalsAmount;
    }

    /**
     * @return int
     */
    public function getNbDecimalsPrice()
    {
        return $this->nbDecimalsPrice;
    }

    /**
     * @param int $nbDecimalsPrice
     */
    public function setNbDecimalsPrice($nbDecimalsPrice)
    {
        $this->nbDecimalsPrice = $nbDecimalsPrice;
    }

    /**
     * @return int
     */
    public function getPaymentTypeId()
    {
        return $this->paymentTypeId;
    }

    /**
     * @param int $paymentTypeId
     */
    public function setPaymentTypeId($paymentTypeId)
    {
        $this->paymentTypeId = $paymentTypeId;
    }

    /**
     * @return int
     */
    public function getPrProjectId()
    {
        return $this->prProjectId;
    }

    /**
     * @param int $prProjectId
     */
    public function setPrProjectId($prProjectId)
    {
        $this->prProjectId = $prProjectId;
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

    /**
     * @return string
     */
    public function getTermsOfPaymentText()
    {
        return $this->termsOfPaymentText;
    }

    /**
     * @param string $termsOfPaymentText
     */
    public function setTermsOfPaymentText($termsOfPaymentText)
    {
        $this->termsOfPaymentText = $termsOfPaymentText;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
} 