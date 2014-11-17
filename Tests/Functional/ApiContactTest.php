<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

class ApiContactTest extends ApiBase
{
    public function testList()
    {
        $api = $this->getApi();
        $all = $api->search(array(), null, 3);
        $this->assertCount(3, $all);
        static::$listData = $all;
    }

    public function testSearchPerson()
    {
        $api = $this->getApi();
        $data = $this->getValidArray();
        $returnData = $api->searchForExistingPerson($data['mail']);
        $this->assertArrayHasKey(0, $returnData);
        $this->assertEquals($data, $returnData[0]);
        $returnData = $api->searchForExistingPerson($data['mail'], $data['firstName']);
        $this->assertArrayHasKey(0, $returnData);
        $this->assertEquals($data, $returnData[0]);
        $returnData = $api->searchForExistingPerson($data['mail'], $data['firstName'], $data['name'], $data['postcode'], $data['city']);
        $this->assertArrayHasKey(0, $returnData);
        $this->assertEquals($data, $returnData[0]);
    }


    public function testSearchCompany()
    {
        $api = $this->getApi();
        $data = $this->getValidArray();
        $data = $api->searchForExistingCompany($data['postcode'], $data['city'], $data['name']);
        $this->assertEquals($data, $data);
    }

    public function testAddContact()
    {
        $api = $this->getApi();
        $contact = $api->addContact('testabc', 'firstabc', 'test@test.ch', '1234', 'Entenhausen', 'abcStrasse 10');
        $this->assertEquals('testabc', $contact['name']);
        $this->assertEquals('firstabc', $contact['firstName']);
        $this->assertEquals('test@test.ch', $contact['mail']);
        $this->assertEquals('1234', $contact['postcode']);
        $this->assertEquals('Entenhausen', $contact['city']);
        $this->assertEquals('abcStrasse 10', $contact['address']);
    }

    public function testAddContactWithCompany()
    {
        $api = $this->getApi();
        $contact = $api->addContact('testabc', 'firstabc', 'test@test.ch', '1234', 'Entenhausen', 'abcStrasse 10', null, 'testCompany AG');
        $this->assertEquals('testabc', $contact['name']);
        $this->assertEquals('firstabc', $contact['firstName']);
        $this->assertEquals('test@test.ch', $contact['mail']);
        $this->assertEquals('1234', $contact['postcode']);
        $this->assertEquals('Entenhausen', $contact['city']);
        $this->assertEquals('abcStrasse 10', $contact['address']);
        $this->assertGreaterThan(0, $contact['company']);
    }


}