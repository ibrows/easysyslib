<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:22
 */

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\API\Order;

class APITest extends AbstractAPITest
{
    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param string $model
     * @param object $newObject
     * @param array $mockData
     * @param array $data
     * @param array $methods
     */
    public function testApiMethods(
        AbstractAPI $api,
        $model,
        $newObject,
        array $mockData,
        array $data,
        array $methods = array('call', 'show', 'search', 'create', 'update', 'delete')
    ) {
        foreach($methods as $method){
            $this->assertMethod($api, $method);
        }
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param string $model
     */
    public function testShow(AbstractAPI $api, $model)
    {
        $this->assertMethod($api, 'show');

        $showData = $api->showArray(1);
        $this->assertTrue(is_array($showData));

        $showObject = $api->showObject(1);
        $this->assertTrue(is_object($showObject));
        $this->assertInstanceOf($model, $showObject);
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param string $model
     * @param object $newObject
     * @param array $mockData
     * @param array $data
     */
    public function testCreate(AbstractAPI $api, $model, $newObject, array $mockData, array $data)
    {
        $this->assertMethod($api, 'createFromObject');
        $object = $api->createFromObject($newObject);
        $this->assertInstanceOf($model, $object);

        $this->assertMethod($api, 'createFromArray');
        $data = $api->createFromArray(array(current($mockData) => current($data)));
        $this->assertTrue(is_array($data));
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param string $model
     * @param object $newObject
     * @param array $mockData
     * @param array $data
     */
    public function testUpdate(AbstractAPI $api, $model, $newObject, array $mockData, array $data)
    {
        $mock = $this->getMockConnection();
        $mock->expects($this->exactly(3))
            ->method('call')
            ->will($this->returnValue($mockData));
        $api->setConnection($mock);

        $this->assertMethod($api, 'update');
        $update = $api->update(1, $mockData);

        $this->assertTrue(is_array($update));
        $this->assertEquals($mockData, $update);

        $this->assertMethod($api, 'updateFromArray');
        $contact = $api->updateFromArray(1, $data);

        $this->assertTrue(is_array($contact));
        $this->assertEquals($data, $contact);

        $this->assertMethod($api, 'updateFromObject');
        $update = $api->updateFromObject(1, $newObject);

        $this->assertInstanceOf($model, $update);
        $this->assertEquals($newObject, $update);
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param string $model
     * @param object $newObject
     * @param array $mockData
     * @param array $data
     */
    public function testSearch(AbstractAPI $api, $model, $newObject, array $mockData, array $data)
    {
        $this->assertMethod($api, 'search');

        $mock = $this->getMockConnection();

        $mock->expects($this->exactly(3))
            ->method('call')
            ->will($this->returnValue(array(array())));
        $api->setConnection($mock);

        $searchObjects = $api->search(array(current($mockData) => current($data)));
        $this->assertTrue(is_array($searchObjects));

        $searchObjects = $api->searchObjects(array(current($mockData) => current($data)));
        $searchObject = current($searchObjects);
        $this->assertInstanceOf($model, $searchObject);

        $searchObjects = $api->searchArrays(array(current($mockData) => current($data)));
        $searchObject = current($searchObjects);
        $this->assertTrue(is_array($searchObject));
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     */
    public function testDelete(AbstractAPI $api)
    {
        $mock = $this->getMockConnection();
        $mock->expects($this->exactly(1))
            ->method('call')
            ->will($this->returnValue(array('success' => true)));

        $api->setConnection($mock);

        $this->assertMethod($api, 'delete');
        $return = $api->delete(1);

        $this->assertTrue($return);
    }

    /**
     * @return array
     */
    public function provideAPIs()
    {
        return array(
            $this->provideContactApi(),
            $this->provideContactApi('schwurbbel..%&/ç*'),
            $this->provideOrderApi(),
            $this->provideOrderApi('schwurbbel..%&/ç*')
        );

        /*array(
            new Invoice($this->getMockConnection()),
            'Ibrows\EasySysLibrary\Model\Invoice',
            function () {
                $invoice = new \Ibrows\EasySysLibrary\Model\Invoice();
                return $invoice;
            },
            array(
                'asd_1' => 'gugüs'
            ),
            array(
                'asd' => 'gugüs'
            )
        ),*/
    }

    /**
     * @param string $name
     * @return array
     */
    protected function provideContactApi($name = 'gugüs')
    {
        $model = new \Ibrows\EasySysLibrary\Model\Contact(null, 'first', null, null);
        $model->setLastName($name);

        return array(
            new Contact($this->getMockConnection()),
            'Ibrows\EasySysLibrary\Model\Contact',
            $model,
            array('name_1' => $name),
            array('name' => $name)
        );
    }

    /**
     * @param string $apiReference
     * @return array
     */
    protected function provideOrderApi($apiReference = 'Test-Order')
    {
        $model = new \Ibrows\EasySysLibrary\Model\Order(null, null);
        $model->setApiReference($apiReference);

        return array(
            new Order($this->getMockConnection()),
            'Ibrows\EasySysLibrary\Model\Order',
            $model,
            array('api_reference' => $apiReference),
            array('apiReference' => $apiReference)
        );
    }
} 