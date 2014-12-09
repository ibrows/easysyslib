<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 20:57
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Tax;

class APITaxTest extends AbstractConcreteAPITest
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
     * @return AbstractAPI|Tax
     */
    protected function getApi()
    {
        return new Tax($this->getConnection());
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
        $this->assertEquals($data['value'], $result['value']);
        $this->assertEquals($data['id'], $result['id']);

        $result = $api->showArray($data['id']);
        $this->assertArray($result);
        $this->assertEquals($data['value'], $result['value']);
        $this->assertEquals($data['id'], $result['id']);

        $result = $api->showObject($data['id']);
        $this->assertObject($result);
        $this->assertEquals($data['value'], $result->getValue());
        $this->assertEquals($data['id'], $result->getId());
    }
}