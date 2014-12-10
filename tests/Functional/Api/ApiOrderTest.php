<?php

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\ApiInterface;
use Ibrows\EasySysLibrary\Api\OrderApi;
use Ibrows\EasySysLibrary\Model\Order\Order;
use Ibrows\EasySysLibrary\Model\Order\OrderPositionDefault;
use Ibrows\EasySysLibrary\Model\Order\OrderPositionText;

class ApiOrderTest extends AbstractConcreteApiTest
{
    public function testCreateInvoice()
    {
        $api = $this->getApi();
        $order = $this->testCreatePositions();

        $invoice = $api->createInvoiceObject($order);

        var_dump($invoice);
        die;
    }

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
        $this->assertEquals($data['api_reference'], $result['api_reference']);
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
     * @return ApiInterface|OrderApi
     */
    protected function getApi()
    {
        return new OrderApi($this->getConnection());
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
        /** @var Order $data */
        $data = $this->getValidObject();
        $result = $api->searchObjects(array('documentNumber' => $data->getDocumentNumber(), 'title' => $data->getTitle()));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertModel($result);
        $this->assertEquals($data, $result);
    }

    public function testCreateObject()
    {
        $api = $this->getApi();
        $object = new Order($api->getConnection()->getUserId(), $api->getConnection()->getUserId());
        $object->setTitle('Test-Create-Order');

        /** @var Order $result */
        $result = $api->createFromObject($object);

        $this->assertModel($object);
        $this->assertEquals('Test-Create-Order', $result->getTitle());
        $this->updateObject($result);
    }

    /**
     * @param Order $object
     */
    public function updateObject($object)
    {
        $this->assertModel($object);

        $api = $this->getApi();

        $object->setTitle('testupdateabc');
        $object->setDeliveryAddressManual("Mike Meier\nSeestrasse 356\n8038 Zürich");

        sleep(1);
        /** @var Order $result */
        $result = $api->updateFromObject($object->getId(), $object);

        $this->assertModel($object);
        $this->assertEquals($object->getTitle(), $result->getTitle());
        $this->assertEquals($object->getDeliveryAddressManual(), $result->getDeliveryAddress());

        $this->assertGreaterThan($object->getUpdatedAt(), $result->getUpdatedAt());
        $this->delete($result->getId());
    }

    public function testCreateArray()
    {
        $api = $this->getApi();
        $result = $api->createFromArray(array('title' => 'testabc', 'contactId' => 1));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testabc', $result['title']);
        $this->updateArray($result);
    }

    public function updateArray($data)
    {
        $api = $this->getApi();
        $result = $api->updateFromArray($data['id'], array('title' => 'testupdateabc', 'apiReference' => 'api-ref'));
        $this->assertTrue(is_array($result));
        $this->assertEquals('testupdateabc', $result['title']);
        $this->assertEquals('api-ref', $result['apiReference']);
        $this->delete($data['id']);
    }

    public function testCreatePositions()
    {
        $api = $this->getApi();

        $order = new Order(1, 1);
        $order->setTitle('Text-Position');
        $order->setMwstNet(false);

        $order->addPosition(new OrderPositionText('Super-Position #1'));
        $order->addPosition(new OrderPositionText('Super-Position #2'));
        $order->addPosition(new OrderPositionDefault(10, 1, 18.75));

        /** @var Order $result */
        $result = $api->createFromObject($order);
        $this->assertCount(count($order->getPositions()), $result->getPositions());

        $order = new Order(1, 1);
        $order->setTitle('OrderPositionDefaults');
        $order->setMwstNet(false);

        $position = new OrderPositionDefault(10, 1, 18.75);
        $position->setText('OrderPositionDefault');
        $order->addPosition($position);

        $position = new OrderPositionDefault(15, 4, 15.30);
        $position->setText('OrderPositionDefault');
        $order->addPosition($position);

        $order->addPosition(new OrderPositionText('Super-Position #2'));

        /** @var Order $result */
        $result = $api->createFromObject($order);
        $this->assertCount(count($order->getPositions()), $result->getPositions());

        return $result;
    }

    public function testCreate()
    {
        $api = $this->getApi();
        $result = $api->create(array('title' => 'Neue Order', 'contact_id' => 1));
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
                array('field' => 'contact_id', 'value' => $data['contact_id'], 'criteria' => 'like'),
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
        $result = $api->searchArrays(array('document_nr' => $data['documentNumber'], 'api_reference' => $data['apiReference']));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['documentNumber'], $result['documentNumber']);
        $this->assertEquals($data['apiReference'], $result['apiReference']);
        $this->assertEquals($data['title'], $result['title']);
    }
}