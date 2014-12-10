<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Converter\AbstractConverter;

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 14:29
 */
abstract class AbstractConcreteApiTest extends AbstractApiTest
{
    /**
     * @var array
     */
    protected static $listData = array();

    public static function setUpBeforeClass()
    {
        static::$listData = array();
    }

    public function setup()
    {
        if (static::$listData) {
            return;
        }

        $all = $this->getApi()->search(array(), null, 3);
        $this->assertCount(3, $all);
        static::$listData = $all;
    }

    /**
     * @return AbstractApi
     */
    abstract protected function getApi();

    /**
     * @return AbstractConverter
     */
    protected function getConverter()
    {
        return $this->getApi()->getConverter();
    }

    /**
     * Very hard to test without concrete implementation (mapping)
     */
    abstract public function testShow();

    /**
     * @return array
     */
    protected function getValidArray()
    {
        return $this->getConverter()->convertEasySysToArray($this->getValidData());
    }

    /**
     * @param object $object
     */
    protected function assertObject($object)
    {
        $this->assertTrue(is_object($object));
    }

    /**
     * @param object $object
     */
    protected function assertModel($object)
    {
        $this->assertInstanceOf($this->getModelName(), $object);
    }

    /**
     * @param array $array
     */
    protected function assertArray($array)
    {
        $this->assertTrue(is_array($array));
    }

    /**
     * @return string
     */
    protected function getModelName()
    {
        return get_class($this->getValidObject());
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function getValidData()
    {
        if (!isset(static::$listData[0])) {
            throw new \Exception("Call list first to setup listData");
        }
        return static::$listData[0];
    }

    /**
     * @return object
     */
    protected function getValidObject()
    {
        return $this->getConverter()->convertEasySysToObject($this->getValidData());
    }
} 