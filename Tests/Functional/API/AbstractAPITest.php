<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Tests\Functional\ConnectionTest;

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 14:29
 */
abstract class AbstractAPITest extends \PHPUnit_Framework_TestCase
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
     * @return AbstractAPI
     */
    abstract protected function getApi();

    /**
     * @return ConnectionInterface|null
     */
    protected function getConnection()
    {
        return ConnectionTest::getConnection();
    }
} 