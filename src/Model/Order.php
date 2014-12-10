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
    protected $id;

    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var float
     */
    protected $totalGross;

    /**
     * @var float
     */
    protected $totalNet;

    /**
     * @var float
     */
    protected $totalTaxes;

    /**
     * @var float
     */
    protected $total;

    /**
     * @var string
     */
    protected $contactAddress;

    /**
     * @var string
     */
    protected $deliveryAddress;

    /**
     * @var int
     */
    protected $kbItemStatusId;

    /**
     * @var bool
     */
    protected $recurring;

    /**
     * @var \DateTime
     */
    protected $viewedByClientAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

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
     * @var string
     */
    protected $documentNumber;

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
    protected $compactView;

    /**
     * @var \DateTime (converted to yyyy-mm-dd)
     */
    protected $validFrom;

    /**
     * @var int
     */
    protected $languageId;

    /**
     * @var int
     */
    protected $logopaperId;

    /**
     * @var mixed
     * @todo resolve correct type - what is it?
     */
    protected $tax;

    /**
     * @var bool
     *
     * This value affects the total if the field mwst_type has been set to 0.
     * false = Taxes are included in the total
     * true = Taxes will be added to the total
     */
    protected $mwstNet;

    /**
     * @var array
     */
    protected $taxs;

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
        foreach (array_keys($this->positions, $orderPosition, true) as $key) {
            unset($this->positions[$key]);
        }
    }

    /**
     * @return OrderPosition[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param OrderPosition[] $positions
     */
    public function setPositions($positions)
    {
        $this->positions = null;

        if (is_null($positions)) {
            return;
        }

        foreach ($positions as $position) {
            $this->addPosition($position);
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
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return float
     */
    public function getTotalGross()
    {
        return $this->totalGross;
    }

    /**
     * @param float $totalGross
     */
    public function setTotalGross($totalGross)
    {
        $this->totalGross = $totalGross;
    }

    /**
     * @return float
     */
    public function getTotalNet()
    {
        return $this->totalNet;
    }

    /**
     * @param float $totalNet
     */
    public function setTotalNet($totalNet)
    {
        $this->totalNet = $totalNet;
    }

    /**
     * @return float
     */
    public function getTotalTaxes()
    {
        return $this->totalTaxes;
    }

    /**
     * @param float $totalTaxes
     */
    public function setTotalTaxes($totalTaxes)
    {
        $this->totalTaxes = $totalTaxes;
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
        $this->setDeliveryAddressType(\Ibrows\EasySysLibrary\API\Order::DELIVERY_TYPE_OWN);
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
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return string
     */
    public function getContactAddress()
    {
        return $this->contactAddress;
    }

    /**
     * @param string $contactAddress
     */
    public function setContactAddress($contactAddress)
    {
        $this->contactAddress = $contactAddress;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return int
     */
    public function getKbItemStatusId()
    {
        return $this->kbItemStatusId;
    }

    /**
     * @param int $kbItemStatusId
     */
    public function setKbItemStatusId($kbItemStatusId)
    {
        $this->kbItemStatusId = $kbItemStatusId;
    }

    /**
     * @return \DateTime
     */
    public function getViewedByClientAt()
    {
        return $this->viewedByClientAt;
    }

    /**
     * @param \DateTime $viewedByClientAt
     */
    public function setViewedByClientAt(\DateTime $viewedByClientAt = null)
    {
        $this->viewedByClientAt = $viewedByClientAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return array
     */
    public function getTaxs()
    {
        return $this->taxs;
    }

    /**
     * @param array $taxs
     */
    public function setTaxs(array $taxs = null)
    {
        $this->taxs = $taxs;
    }

    /**
     * @return boolean
     */
    public function isCompactView()
    {
        return $this->compactView;
    }

    /**
     * @param boolean $compactView
     */
    public function setCompactView($compactView)
    {
        $this->compactView = $compactView;
    }

    /**
     * @return boolean
     */
    public function isMwstNet()
    {
        return $this->mwstNet;
    }

    /**
     * @param boolean $mwstNet
     */
    public function setMwstNet($mwstNet)
    {
        $this->mwstNet = $mwstNet;
    }

    /**
     * @return boolean
     */
    public function isRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param boolean $recurring
     */
    public function setRecurring($recurring)
    {
        $this->recurring = $recurring;
    }

    /**
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * @param \DateTime $validFrom
     */
    public function setValidFrom(\DateTime $validFrom = null)
    {
        $this->validFrom = $validFrom;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax = null)
    {
        $this->tax = $tax;
    }

    /**
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param string $documentNumber
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }
}