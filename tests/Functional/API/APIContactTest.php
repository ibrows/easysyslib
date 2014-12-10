<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\ApiInterface;
use Ibrows\EasySysLibrary\Api\Contact;
use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\ContactConverter;

class ApiContactTest extends AbstractConcreteApiTest
{
    public function delete($id)
    {
        $api = $this->getApi();
        $result = $api->delete($id);
        $this->assertTrue($result);
    }

    public function testShow()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->show($data['id']);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'], $result['name_1']);
        $this->assertEquals($data['name_2'], $result['name_2']);

        $result = $api->showArray($data['id']);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'], $result['name']);
        $this->assertEquals($data['name_2'], $result['firstName']);

        $result = $api->showObject($data['id']);
        $this->assertTrue(is_object($result));
        $this->assertEquals($data['name_1'], $result->getLastName());
        $this->assertEquals($data['name_2'], $result->getFirstName());
    }

    /**
     * @return ApiInterface|Contact
     */
    protected function getApi()
    {
        return new Contact($this->getConnection());
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

    public function testSearch()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(array('name_1' => $data['name_1'], 'mail' => $data['mail']));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'], $result['name_1']);
        $this->assertEquals($data['name_2'], $result['name_2']);
        $this->assertEquals($data['mail'], $result['mail']);
    }

    public function testSearchObject()
    {
        $api = $this->getApi();
        $data = $this->getValidObject();
        $result = $api->searchObjects(array('name' => $data->getName(), 'mail' => $data->getMail()));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertModel($result);
        $this->assertEquals($data, $result);
    }

    public function testCreateObject()
    {
        $api = $this->getApi();
        $object = new \Ibrows\EasySysLibrary\Model\Contact($api->getTypeIdPrivate(), 'testabc', $api->getConnection()->getUserId(), $api->getConnection()->getUserId());
        /** @var \Ibrows\EasySysLibrary\Model\Contact $result */
        $result = $api->createFromObject($object);
        $this->assertModel($object);
        $this->assertEquals('testabc', $result->getName());
        $this->updateObject($result);
    }

    /**
     * @param \Ibrows\EasySysLibrary\Model\Contact $object
     */
    public function updateObject($object)
    {
        $this->assertModel($object);

        $api = $this->getApi();
        $object->setName('testupdateabc');
        $object->setMail('testupdate@abc.ch');
        $result = $api->updateFromObject($object->getId(), $object);
        $this->assertModel($object);
        $this->assertEquals($object->getName(), $result->getName());
        $this->assertEquals($object->getMail(), $result->getMail());
        $this->assertGreaterThan($object->getUpdatedAt(), $result->getUpdatedAt());
        $this->delete($result->getId());
    }

    public function testCreateArray()
    {
        $api = $this->getApi();
        $result = $api->createFromArray(array('name' => 'testabc'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testabc', $result['name']);
        $this->updateArray($result);
    }

    public function updateArray($data)
    {
        $api = $this->getApi();
        $result = $api->updateFromArray($data['id'], array('name' => 'testupdateabc', 'mail' => 'testupdate@abc.ch',));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testupdateabc', $result['name']);
        $this->assertEquals('testupdate@abc.ch', $result['mail']);
        $this->delete($data['id']);
    }

    public function testCreate()
    {
        $api = $this->getApi();
        $result = $api->create(array('name_1' => 'testabc'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testabc', $result['name_1']);
        $this->update($result);
    }

    public function update($data)
    {
        $api = $this->getApi();
        $result = $api->update($data['id'], array('name_1' => 'testupdateabc', 'mail' => 'testupdate@abc.ch',));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testupdateabc', $result['name_1']);
        $this->assertEquals('testupdate@abc.ch', $result['mail']);
        $this->delete($data['id']);
    }

    public function testSearchExtended()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(
            array(
                array('field' => 'name_1', 'value' => $data['name_1'], 'criteria' => 'equal'),
                array('field' => 'mail', 'value' => $data['mail'], 'criteria' => 'like'),
            )
        );
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'], $result['name_1']);
        $this->assertEquals($data['name_2'], $result['name_2']);
        $this->assertEquals($data['mail'], $result['mail']);
    }

    public function testSearchCriteria()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $criteria = $api->convertSimpleCriteria(array('name_1' => $data['name_1'], 'mail' => $data['mail']), 'like');
        $result = $api->search($criteria);
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'], $result['name_1']);
        $this->assertEquals($data['name_2'], $result['name_2']);
        $this->assertEquals($data['mail'], $result['mail']);
    }

    public function testSearchArray()
    {
        $api = $this->getApi();
        $data = $this->getValidArray();
        $result = $api->searchArrays(array('name' => $data['name'], 'mail' => $data['mail']));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name'], $result['name']);
        $this->assertEquals($data['firstName'], $result['firstName']);
        $this->assertEquals($data['mail'], $result['mail']);
    }
}