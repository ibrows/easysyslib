<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:51
 */

namespace Ibrows\EasySysLibrary\Model\Traits;

use Ibrows\EasySysLibrary\Model\PositionInterface;

trait Document
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
     * @var int
     */
    protected $paymentTypeId;

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
     * @var int
     */
    protected $kbItemStatusId;

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
     * @var string
     */
    protected $contactSubId;

    /**
     * @var string
     */
    protected $currencyId;

    /**
     * @var string (4000)
     */
    protected $footer;

    /**
     * @var string (4000)
     */
    protected $header;

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
     * @var string (80)
     */
    protected $title;

    /**
     * @var PositionInterface[]
     */
    protected $positions = array();

    /**
     * @var mixed
     */
    protected $tax;

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
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
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
     * @param PositionInterface $position
     */
    public function addPosition(PositionInterface $position)
    {
        $this->positions[] = $position;
    }

    /**
     * @param PositionInterface $position
     */
    public function removePosition(PositionInterface $position)
    {
        foreach (array_keys($this->positions, $position, true) as $key) {
            unset($this->positions[$key]);
        }
    }

    /**
     * @return PositionInterface[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param PositionInterface[] $positions
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
} 