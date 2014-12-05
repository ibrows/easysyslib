<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:42
 */

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;

abstract class AbstractConcreteAPITest extends AbstractAPITest
{
    /**
     * @return AbstractAPI
     */
    abstract protected function getAPI();

    /**
     * Not possible to test in APITest with provider data
     */
    abstract protected function testConvertCriteria();

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