<?php

namespace Ibrows\EasySysLibrary\Converter\Stock;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

/**
 * @see https://docs.easysys.ch/ressources/article_type/#show-item-type
 */
class StockAreaConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\StockArea';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'       => 'id', // int
        'stock_id' => 'stockId', // int
        'name'     => 'name', // string
    );
}