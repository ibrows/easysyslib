<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 22:31
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Tests\Functional\ConnectionTest;

abstract class AbstractAPITest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return ConnectionInterface|null
     */
    protected function getConnection()
    {
        if(!$connection = ConnectionTest::getConnection()){
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
        return $connection;
    }
} 