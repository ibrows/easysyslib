<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:42
 */

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;

abstract class AbstractConcreteApiTest extends AbstractApiTest
{
    /**
     * @return AbstractApi
     */
    abstract protected function getApi();

    /**
     * Not possible to test in ApiTest with provider data
     */
    abstract public function testConvertCriteria();

    /**
     * @return object
     */
    abstract protected function getModel();

    /**
     * @param object $object
     */
    protected function assertModel($object)
    {
        $this->assertInstanceOf(get_class($this->getModel()), $object);
    }
}