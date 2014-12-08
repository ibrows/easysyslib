<?php

namespace Ibrows\EasySysLibrary\Model;

class Article
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int Resource account
     */
    protected $accountId;

    /**
     * @var int Resource article_group
     */
    protected $articleGroupId;

    /**
     * @var int Resource article
     */
    protected $articleId;

    /**
     * @var int Resource article_type
     */
    protected $articleTypeId;

    /**
     * @var string
     */
    protected $characterInfo;

    /**
     * @var int Resource contact
     */
    protected $contactId;

    /**
     * @var int Resource currency
     */
    protected $currencyId;

    /**
     * @var string
     */
    protected $delivererCode;

    /**
     * @var string
     */
    protected $delivererDescription;

    /**
     * @var string
     */
    protected $delivererName;

    /**
     * @var float
     */
    protected $deliveryPrice;

    /**
     * @var int Resource account
     */
    protected $expenseAccountId;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var string
     */
    protected $htmlText;

    /**
     * @var string
     */
    protected $internCode;

    /**
     * @var string
     */
    protected $internDescription;

    /**
     * @var string
     */
    protected $internName;

    /**
     * @var boolean
     */
    protected $isUsingSetPriceCalc;

    /**
     * @var float
     */
    protected $marginFromPurchasePrice;

    /**
     * @var float
     */
    protected $marginFromSalePrice;

    /**
     * @var float
     */
    protected $purchasePrice;

    /**
     * @var float
     */
    protected $purchaseTotal;

    /**
     * @var string
     */
    protected $remarks;

    /**
     * @var float
     */
    protected $salePrice;

    /**
     * @var float
     */
    protected $saleTotal;

    /**
     * @var int Resource stock
     */
    protected $stockId;

    /**
     * @var float
     */
    protected $stockMinNr;

    /**
     * @var float
     */
    protected $stockNr;

    /**
     * @var int Resource stock_place
     */
    protected $stockPlaceId;

    /**
     * @var int Resource tax
     */
    protected $taxExpenseId;

    /**
     * @var int Resource tax
     */
    protected $taxIncomeId;

    /**
     * @var int Resource unit
     */
    protected $unitId;

    /**
     * @var int Resource user
     */
    protected $userId;

    /**
     * @var int
     */
    protected $volume;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var array
     */
    protected $additionalData;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return $this
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleGroupId()
    {
        return $this->articleGroupId;
    }

    /**
     * @param int $articleGroupId
     * @return $this
     */
    public function setArticleGroupId($articleGroupId)
    {
        $this->articleGroupId = $articleGroupId;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     * @return $this
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleTypeId()
    {
        return $this->articleTypeId;
    }

    /**
     * @param int $articleTypeId
     * @return $this
     */
    public function setArticleTypeId($articleTypeId)
    {
        $this->articleTypeId = $articleTypeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacterInfo()
    {
        return $this->characterInfo;
    }

    /**
     * @param string $characterInfo
     * @return $this
     */
    public function setCharacterInfo($characterInfo)
    {
        $this->characterInfo = $characterInfo;
        return $this;
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
     * @return $this
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param int $currencyId
     * @return $this
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelivererCode()
    {
        return $this->delivererCode;
    }

    /**
     * @param string $delivererCode
     * @return $this
     */
    public function setDelivererCode($delivererCode)
    {
        $this->delivererCode = $delivererCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelivererDescription()
    {
        return $this->delivererDescription;
    }

    /**
     * @param string $delivererDescription
     * @return $this
     */
    public function setDelivererDescription($delivererDescription)
    {
        $this->delivererDescription = $delivererDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelivererName()
    {
        return $this->delivererName;
    }

    /**
     * @param string $delivererName
     * @return $this
     */
    public function setDelivererName($delivererName)
    {
        $this->delivererName = $delivererName;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeliveryPrice()
    {
        return $this->deliveryPrice;
    }

    /**
     * @param float $deliveryPrice
     * @return $this
     */
    public function setDeliveryPrice($deliveryPrice)
    {
        $this->deliveryPrice = $deliveryPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpenseAccountId()
    {
        return $this->expenseAccountId;
    }

    /**
     * @param int $expenseAccountId
     * @return $this
     */
    public function setExpenseAccountId($expenseAccountId)
    {
        $this->expenseAccountId = $expenseAccountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlText()
    {
        return $this->htmlText;
    }

    /**
     * @param string $htmlText
     * @return $this
     */
    public function setHtmlText($htmlText)
    {
        $this->htmlText = $htmlText;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternCode()
    {
        return $this->internCode;
    }

    /**
     * @param string $internCode
     * @return $this
     */
    public function setInternCode($internCode)
    {
        $this->internCode = $internCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternDescription()
    {
        return $this->internDescription;
    }

    /**
     * @param string $internDescription
     * @return $this
     */
    public function setInternDescription($internDescription)
    {
        $this->internDescription = $internDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternName()
    {
        return $this->internName;
    }

    /**
     * @param string $internName
     * @return $this
     */
    public function setInternName($internName)
    {
        $this->internName = $internName;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsUsingSetPriceCalc()
    {
        return $this->isUsingSetPriceCalc;
    }

    /**
     * @param boolean $isUsingSetPriceCalc
     * @return $this
     */
    public function setIsUsingSetPriceCalc($isUsingSetPriceCalc)
    {
        $this->isUsingSetPriceCalc = $isUsingSetPriceCalc;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarginFromPurchasePrice()
    {
        return $this->marginFromPurchasePrice;
    }

    /**
     * @param float $marginFromPurchasePrice
     * @return $this
     */
    public function setMarginFromPurchasePrice($marginFromPurchasePrice)
    {
        $this->marginFromPurchasePrice = $marginFromPurchasePrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarginFromSalePrice()
    {
        return $this->marginFromSalePrice;
    }

    /**
     * @param float $marginFromSalePrice
     * @return $this
     */
    public function setMarginFromSalePrice($marginFromSalePrice)
    {
        $this->marginFromSalePrice = $marginFromSalePrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * @param float $purchasePrice
     * @return $this
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getPurchaseTotal()
    {
        return $this->purchaseTotal;
    }

    /**
     * @param float $purchaseTotal
     * @return $this
     */
    public function setPurchaseTotal($purchaseTotal)
    {
        $this->purchaseTotal = $purchaseTotal;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     * @return $this
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * @return float
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @param float $salePrice
     * @return $this
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getSaleTotal()
    {
        return $this->saleTotal;
    }

    /**
     * @param float $saleTotal
     * @return $this
     */
    public function setSaleTotal($saleTotal)
    {
        $this->saleTotal = $saleTotal;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * @param int $stockId
     * @return $this
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;
        return $this;
    }

    /**
     * @return float
     */
    public function getStockMinNr()
    {
        return $this->stockMinNr;
    }

    /**
     * @param float $stockMinNr
     * @return $this
     */
    public function setStockMinNr($stockMinNr)
    {
        $this->stockMinNr = $stockMinNr;
        return $this;
    }

    /**
     * @return float
     */
    public function getStockNr()
    {
        return $this->stockNr;
    }

    /**
     * @param float $stockNr
     * @return $this
     */
    public function setStockNr($stockNr)
    {
        $this->stockNr = $stockNr;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockPlaceId()
    {
        return $this->stockPlaceId;
    }

    /**
     * @param int $stockPlaceId
     * @return $this
     */
    public function setStockPlaceId($stockPlaceId)
    {
        $this->stockPlaceId = $stockPlaceId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxExpenseId()
    {
        return $this->taxExpenseId;
    }

    /**
     * @param int $taxExpenseId
     * @return $this
     */
    public function setTaxExpenseId($taxExpenseId)
    {
        $this->taxExpenseId = $taxExpenseId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxIncomeId()
    {
        return $this->taxIncomeId;
    }

    /**
     * @param int $taxIncomeId
     * @return $this
     */
    public function setTaxIncomeId($taxIncomeId)
    {
        $this->taxIncomeId = $taxIncomeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @param int $unitId
     * @return $this
     */
    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
        return $this;
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
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     * @return $this
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return array
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    /**
     * @param array $additionalData
     */
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }
}