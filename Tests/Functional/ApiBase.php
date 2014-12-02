<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Ibrows\EasySysLibrary\API\AbstractApi;
use Ibrows\EasySysLibrary\Converter\ContactConverter;

abstract class ApiBase extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!$this->getConnection()) {
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
    }

    /**
     * @return \Ibrows\EasySysLibrary\Model\Contact
     */
    protected function getValidObject()
    {
        return $this->getConverter()->convertEasySysToObject(static::$listData[0]);
    }

    /**
     * @return array
     */
    protected function getValidArray()
    {
        return $this->getConverter()->convertEasySysToArray(static::$listData[0]);
    }

    /**
     * @return ContactConverter
     */
    protected function getConverter()
    {
        return $converter = new ContactConverter();
    }

    /**
     * @return AbstractApi
     */
    abstract protected function getApi();

    protected function getConnection()
    {
        return ConnectionTest::getConnection();
    }
}