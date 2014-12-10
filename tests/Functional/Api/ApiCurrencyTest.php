<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 20:57
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\Currency;

class ApiCurrencyTest extends AbstractConcreteApiTest
{
    /**
     * @expectedException Ibrows\EasySysLibrary\Connection\Exception\StatusCodeException
     * @expectedExceptionMessage Not implemented yet
     */
    public function testCreate()
    {
        $api = $this->getApi();
        $api->create(array('value' => 8.00));
    }

    /**
     * @return AbstractApi|Currency
     */
    protected function getApi()
    {
        return new Currency($this->getConnection());
    }

    /**
     * Very hard to test without concrete implementation (mapping)
     */
    public function testShow()
    {
        $api = $this->getApi();
        $data = $this->getValidData();

        $result = $api->show($data['id']);
        $this->assertArray($result);
        $this->assertEquals($data['name'], $result['name']);
        $this->assertEquals($data['id'], $result['id']);

        $result = $api->showArray($data['id']);
        $this->assertArray($result);
        $this->assertEquals($data['name'], $result['name']);
        $this->assertEquals($data['id'], $result['id']);

        /** @var \Ibrows\EasySysLibrary\Model\Currency $result */
        $result = $api->showObject($data['id']);
        $this->assertObject($result);
        $this->assertEquals($data['name'], $result->getName());
        $this->assertEquals($data['id'], $result->getId());
    }
}