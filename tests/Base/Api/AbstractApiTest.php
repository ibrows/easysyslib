<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:23
 */

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;

abstract class AbstractApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ConnectionInterface
     */
    protected function getMockConnection()
    {
        $mock = $this->getMock('Ibrows\EasySysLibrary\Connection\ConnectionInterface');
        return $mock;
    }

    /**
     * @param object $object
     * @param string $method
     */
    protected function assertMethod($object, $method)
    {
        $this->assertTrue(method_exists($object, $method), "Method $method doesn't exist at " . get_class($object));
    }
}