<?php

namespace Ibrows\EasySysLibrary\Converter;

/**
 * @see https://docs.easysys.ch/ressources/article_type/#show-item-type
 */
class StockLocationConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\StockLocation';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'   => 'id', // int
        'name' => 'name', // string
    );
}