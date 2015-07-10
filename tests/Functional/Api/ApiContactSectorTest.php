<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\ApiInterface;
use Ibrows\EasySysLibrary\Api\ContactSectorApi;

class ApiContactSectorTest extends AbstractConcreteApiTest
{
    /**
     * @return ApiInterface|ContactSectorApi
     */
    protected function getApi()
    {
        return new ContactSectorApi($this->getConnection());
    }

    public function testShow()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->show($data['id']);
        $this->assertArray($result);
        $this->assertEquals($data['name'], $result['name']);

        $result = $api->showArray($data['id']);
        $this->assertArray($result);
        $this->assertEquals($data['name'], $result['name']);

        $result = $api->showObject($data['id']);
        $this->assertObject($result);
        $this->assertEquals($data['name'], $result->getName());
    }

    public function testSearch()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(array('name' => $data['name']));
        $this->assertArray($result);
        $result = array_shift($result);
        $this->assertArray($result);
        $this->assertEquals($data['name'], $result['name']);
    }

}