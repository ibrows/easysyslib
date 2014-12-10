<?php

namespace Ibrows\EasySysLibrary\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\ArticleConverter;

class ArticleApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->converter = new ArticleConverter();
        parent::__construct($connection);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'article';
    }
}