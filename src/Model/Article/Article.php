<?php

namespace Ibrows\EasySysLibrary\Model\Article;

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
    protected $usingSetPriceCalc;

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
     * @var bool
     */
    protected $stock;

    /**
     * @var float
     */
    protected $stockReservedNr;

    /**
     * @var float
     */
    protected $stockAvailableNr;

    /**
     * @var float
     */
    protected $stockPickedNr;

    /**
     * @var float
     */
    protected $stockDisposedNr;

    /**
     * @var float
     */
    protected $stockOrderedNr;

    /**
     * @var int Resource tax
     */
    protected $taxId;

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
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
     */
    public function setArticleGroupId($articleGroupId)
    {
        $this->articleGroupId = $articleGroupId;
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
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
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
     */
    public function setArticleTypeId($articleTypeId)
    {
        $this->articleTypeId = $articleTypeId;
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
     */
    public function setCharacterInfo($characterInfo)
    {
        $this->characterInfo = $characterInfo;
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
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param int $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
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
     */
    public function setDelivererCode($delivererCode)
    {
        $this->delivererCode = $delivererCode;
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
     */
    public function setDelivererDescription($delivererDescription)
    {
        $this->delivererDescription = $delivererDescription;
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
     */
    public function setDelivererName($delivererName)
    {
        $this->delivererName = $delivererName;
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
     */
    public function setDeliveryPrice($deliveryPrice)
    {
        $this->deliveryPrice = $deliveryPrice;
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
     */
    public function setExpenseAccountId($expenseAccountId)
    {
        $this->expenseAccountId = $expenseAccountId;
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
     *
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
     */
    public function setHtmlText($htmlText)
    {
        $this->htmlText = $htmlText;
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
     */
    public function setInternCode($internCode)
    {
        $this->internCode = $internCode;
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
     */
    public function setInternDescription($internDescription)
    {
        $this->internDescription = $internDescription;
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
     */
    public function setInternName($internName)
    {
        $this->internName = $internName;
    }

    /**
     * @return boolean
     */
    public function isUsingSetPriceCalc()
    {
        return $this->usingSetPriceCalc;
    }

    /**
     * @param boolean $usingSetPriceCalc
     */
    public function setIsUsingSetPriceCalc($usingSetPriceCalc)
    {
        $this->usingSetPriceCalc = $usingSetPriceCalc;
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
     */
    public function setMarginFromPurchasePrice($marginFromPurchasePrice)
    {
        $this->marginFromPurchasePrice = $marginFromPurchasePrice;
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
     */
    public function setMarginFromSalePrice($marginFromSalePrice)
    {
        $this->marginFromSalePrice = $marginFromSalePrice;
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
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;
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
     */
    public function setPurchaseTotal($purchaseTotal)
    {
        $this->purchaseTotal = $purchaseTotal;
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
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
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
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
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
     */
    public function setSaleTotal($saleTotal)
    {
        $this->saleTotal = $saleTotal;
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
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;
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
     */
    public function setStockMinNr($stockMinNr)
    {
        $this->stockMinNr = $stockMinNr;
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
     */
    public function setStockNr($stockNr)
    {
        $this->stockNr = $stockNr;
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
     *
     */
    public function setStockPlaceId($stockPlaceId)
    {
        $this->stockPlaceId = $stockPlaceId;
    }

    /**
     * @return boolean
     */
    public function isIsStock()
    {
        return $this->stock;
    }

    /**
     * @param boolean $stock
     */
    public function setIsStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return float
     */
    public function getStockReservedNr()
    {
        return $this->stockReservedNr;
    }

    /**
     * @param float $stockReservedNr
     */
    public function setStockReservedNr($stockReservedNr)
    {
        $this->stockReservedNr = $stockReservedNr;
    }

    /**
     * @return float
     */
    public function getStockAvailableNr()
    {
        return $this->stockAvailableNr;
    }

    /**
     * @param float $stockAvailableNr
     */
    public function setStockAvailableNr($stockAvailableNr)
    {
        $this->stockAvailableNr = $stockAvailableNr;
    }

    /**
     * @return float
     */
    public function getStockPickedNr()
    {
        return $this->stockPickedNr;
    }

    /**
     * @param float $stockPickedNr
     */
    public function setStockPickedNr($stockPickedNr)
    {
        $this->stockPickedNr = $stockPickedNr;
    }

    /**
     * @return float
     */
    public function getStockDisposedNr()
    {
        return $this->stockDisposedNr;
    }

    /**
     * @param float $stockDisposedNr
     *
     */
    public function setStockDisposedNr($stockDisposedNr)
    {
        $this->stockDisposedNr = $stockDisposedNr;
    }

    /**
     * @return float
     */
    public function getStockOrderedNr()
    {
        return $this->stockOrderedNr;
    }

    /**
     * @param float $stockOrderedNr
     */
    public function setStockOrderedNr($stockOrderedNr)
    {
        $this->stockOrderedNr = $stockOrderedNr;
    }

    /**
     * @return int
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param int $taxId
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
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
     */
    public function setTaxExpenseId($taxExpenseId)
    {
        $this->taxExpenseId = $taxExpenseId;
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
     */
    public function setTaxIncomeId($taxIncomeId)
    {
        $this->taxIncomeId = $taxIncomeId;
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
     */
    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
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
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
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
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
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
     */
    public function setWidth($width)
    {
        $this->width = $width;
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
     *
     */
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }
}