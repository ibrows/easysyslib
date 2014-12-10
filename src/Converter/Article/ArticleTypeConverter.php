<?php

namespace Ibrows\EasySysLibrary\Converter\Article;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

/**
 * @see https://docs.easysys.ch/ressources/article_type/#show-item-type
 */
class ArticleTypeConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Article\ArticleType';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'   => 'id', // int
        'name' => 'name', // string
    );
}