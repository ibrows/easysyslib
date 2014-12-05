<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\API\APIInterface;
use Ibrows\EasySysLibrary\API\Order;
use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\OrderConverter;

class APIOrderTest extends AbstractConcreteAPITest
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
        $this->assertEquals($data['api_reference'], $result['apiReference']);
        $this->assertEquals($data['title'], $result['title']);

        $result = $api->showArray($data['id']);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['api_reference'], $result['apiReference']);
        $this->assertEquals($data['title'], $result['title']);

        $result = $api->showObject($data['id']);
        $this->assertTrue(is_object($result));
        $this->assertEquals($data['api_reference'], $result->getApiReference());
        $this->assertEquals($data['title'], $result->getTitle());
    }

    /**
     * @return APIInterface|Order
     */
    protected function getApi()
    {
        return new Order($this->getConnection());
    }

    /**
     * @return AbstractConverter|OrderConverter
     */
    protected function getConverter()
    {
        return $converter = new OrderConverter();
    }

    public function testSearch()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(array('document_nr' => $data['document_nr'], 'total' => $data['total']));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['api_reference'], $result['api_reference']);
        $this->assertEquals($data['document_nr'], $result['document_nr']);
        $this->assertEquals($data['title'], $result['title']);
    }

    public function testSearchObject()
    {
        $api = $this->getApi();
        $data = $this->getValidObject();
        $result = $api->searchObjects(array('documentNr' => $data->getDocumentNumber(), 'title' => $data->getTitle()));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertModel($result);
        $this->assertEquals($data, $result);
    }

    public function testCreateObject()
    {
        $api = $this->getApi();
        $object = new \Ibrows\EasySysLibrary\Model\Order($api->getConnection()->getUserId(), $api->getConnection()->getUserId());
        $object->setTitle('Test-Create-Order');
        /** @var \Ibrows\EasySysLibrary\Model\Order $result */
        $result = $api->createFromObject($object);
        $this->assertModel($object);
        $this->assertEquals('Test-Create-Order', $result->getTitle());
        $this->updateObject($result);
    }

    /**
     * @param \Ibrows\EasySysLibrary\Model\Order $object
     */
    public function updateObject($object)
    {
        $this->assertModel($object);

        $api = $this->getApi();
        $object->setTitle('testupdateabc');
        $object->setDeliveryAddress("Mike Meier\nSeestrasse 356\n8038 Zürich");
        $result = $api->updateFromObject($object->getId(), $object);
        $this->assertModel($object);
        $this->assertEquals($object->getTitle(), $result->getTitle());
        $this->assertEquals($object->getDeliveryAddress(), $result->getDeliveryAddress());
        $this->assertGreaterThan($object->getUpdatedAt(), $result->getUpdatedAt());
        $this->delete($result->getId());
    }

    public function testCreateArray()
    {
        $api = $this->getApi();
        $result = $api->createFromArray(array('title' => 'testabc'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testabc', $result['title']);
        $this->updateArray($result);
    }

    public function updateArray($data)
    {
        $api = $this->getApi();
        $result = $api->updateFromArray($data['id'], array('title' => 'testupdateabc', 'api_reference' => 'api-ref',));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testupdateabc', $result['title']);
        $this->assertEquals('api-ref', $result['api_reference']);
        $this->delete($data['id']);
    }

    public function testCreate()
    {
        $api = $this->getApi();
        $result = $api->create(array('title' => 'Neue Order'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('Neue Order', $result['title']);
        $this->update($result);
    }

    public function update($data)
    {
        $api = $this->getApi();
        $result = $api->update($data['id'], array('title' => 'testupdateabc', 'api_reference' => 'Api-Ref'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testupdateabc', $result['title']);
        $this->assertEquals('Api-Ref', $result['api_reference']);
        $this->delete($data['id']);
    }

    public function testSearchExtended()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(
            array(
                array('field' => 'document_nr', 'value' => $data['document_nr'], 'criteria' => 'equal'),
                array('field' => 'api_reference', 'value' => $data['api_reference'], 'criteria' => 'like'),
            )
        );
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['document_nr'], $result['document_nr']);
        $this->assertEquals($data['api_reference'], $result['api_reference']);
        $this->assertEquals($data['total'], $result['total']);
    }

    public function testSearchCriteria()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $criteria = $api->convertSimpleCriteria(array('document_nr' => $data['document_nr'], 'api_reference' => $data['api_reference']), 'like');
        $result = $api->search($criteria);
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['document_nr'], $result['document_nr']);
        $this->assertEquals($data['api_reference'], $result['api_reference']);
        $this->assertEquals($data['total'], $result['total']);
    }

    public function testSearchArray()
    {
        $api = $this->getApi();
        $data = $this->getValidArray();
        $result = $api->searchArrays(array('document_nr' => $data['document_nr'], 'api_reference' => $data['api_reference']));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['document_nr'], $result['document_nr']);
        $this->assertEquals($data['api_reference'], $result['api_reference']);
        $this->assertEquals($data['title'], $result['title']);
    }
}