<?php

namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\ArticleTypeConverter;

class ArticleType extends AbstractAPI
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->converter = new ArticleTypeConverter();
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'article_type';
    }
}