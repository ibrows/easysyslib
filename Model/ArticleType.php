<?php

namespace Ibrows\EasySysLibrary\Model;

class ArticleType
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArticleType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}