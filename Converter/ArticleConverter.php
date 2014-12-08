<?php

namespace Ibrows\EasySysLibrary\Converter;

/**
 * @see https://docs.easysys.ch/ressources/article/#show-item
 */
class ArticleConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Article';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'                      => 'id', // int
        'account_id'              => 'accountId', // int
        'article_group_id'        => 'articleGroupId', // int
        'article_id'              => 'articleId', // int
        'article_type_id'         => 'articleTypeId', // int
        'character_info'          => 'characterInfo', // string
        'contact_id'              => 'contactId', // int
        'currency_id'             => 'currencyId', // int
        'deliverer_code'          => 'delivererCode', // string
        'deliverer_description'   => 'delivererDescription', // string
        'deliverer_name'          => 'delivererName', // string
        'delivery_price'          => 'deliveryPrice', // float
        'expense_account_id'      => 'expenseAccountId', // int
        'height'                  => 'height', // int
        'html_text'               => 'htmlText', // string
        'intern_code'             => 'internCode', // string
        'intern_description'      => 'internDescription', // string
        'intern_name'             => 'internName', // string
        'is_using_set_price_calc' => 'isUsingSetPriceCalc', // bool
        'marginFromPurchasePrice' => 'marginFromPurchasePrice', // float
        'marginFromSalePrice'     => 'marginFromSalePrice', // float
        'purchase_price'          => 'purchasePrice', // float
        'purchase_total'          => 'purchaseTotal', // float
        'remarks'                 => 'remarks', // string
        'sale_price'              => 'salePrice', // float
        'sale_total'              => 'saleTotal', // float
        'stock_id'                => 'stockId', // int
        'stock_min_nr'            => 'stockMinNr', // float
        'stock_nr'                => 'stockNr', // float
        'stock_place_id'          => 'stockPlaceId', // int
        'is_stock'                => 'isStock', // bool
        'stock_reserved_nr'       => 'stockReservedNr', // float
        'stock_available_nr'      => 'stockAvailableNr', // float
        'stock_picked_nr'         => 'stockPickedNr', // float
        'stock_disposed_nr'       => 'stockDisposedNr', // float
        'stock_ordered_nr'        => 'stockOrderedNr', //float
        'tax_id'                  => 'taxId', // int
        'tax_expense_id'          => 'taxExpenseId', // int
        'tax_income_id'           => 'taxIncomeId', // int
        'unit_id'                 => 'unitId', // int
        'user_id'                 => 'userId', // int
        'volume'                  => 'volume', // int
        'weight'                  => 'weight', // int
        'width'                   => 'width', // int
    );
}