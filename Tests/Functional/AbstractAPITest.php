<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 22:31
 */

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;

abstract class AbstractAPITest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return ConnectionInterface|null
     */
    protected function getConnection()
    {
        return ConnectionTest::getConnection();
    }
} 