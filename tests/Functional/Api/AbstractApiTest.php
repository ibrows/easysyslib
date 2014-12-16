<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 22:31
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Tests\Functional\ConnectionTest;
use Ibrows\EasySysLibrary\Tests\Logger\FileLogger;

abstract class AbstractApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileLogger
     */
    protected static $logger;

    /**
     * @return ConnectionInterface|null
     */
    protected function getConnection()
    {
        if (!$connection = ConnectionTest::getConnection()) {
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
        $connection->setLogger($this->getLogger());
        return $connection;
    }

    protected function getLogger()
    {
        return self::$logger = self::$logger ?: new FileLogger();
    }
} 