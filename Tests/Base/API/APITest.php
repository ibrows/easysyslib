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
use Ibrows\EasySysLibrary\API\Invoice;

class APITest extends AbstractAPITest
{
    /**
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     */
    public function testApiMethods(AbstractAPI $api)
    {
        $this->assertMethod($api, 'call');
        $this->assertMethod($api, 'show');
        $this->assertMethod($api, 'search');
        $this->assertMethod($api, 'create');
        $this->assertMethod($api, 'update');
        $this->assertMethod($api, 'delete');
    }

    /**
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     * @param string      $model
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
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     * @param string      $model
     * @param callable    $getNewModel
     */
    public function testCreate(AbstractAPI $api, $model, $newObject)
    {
        $this->assertMethod($api, 'createFromObject');
        $object = $api->createFromObject($newObject);
        $this->assertInstanceOf($model, $object);

        $this->assertMethod($api, 'createFromArray');
        $object = $api->createFromArray(array('name' => 'gugus'));
        $this->assertInstanceOf($model, $object);
    }

    /**
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     * @param string      $model
     * @param callable    $getNewModel
     * @param array       $mockData
     * @param array       $data
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
        $this->assertEquals($model, $update);

    }

    /**
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     * @param string      $model
     */
    public function testSearch(AbstractAPI $api, $model)
    {
        $this->assertMethod($api, 'search');

        $mock = $this->getMockConnection();

        $mock->expects($this->exactly(3))
            ->method('call')
            ->will($this->returnValue(array(array())));
        $api->setConnection($mock);

        $searchObjects = $api->search(array('name' => 'gugus'));
        $this->assertTrue(is_array($searchObjects));

        $searchObjects = $api->searchObjects(array('name' => 'gugus'));
        $searchObject = current($searchObjects);
        $this->assertInstanceOf($model, $searchObject);

        $searchObjects = $api->searchArrays(array('name' => 'gugus'));
        $searchObject = current($searchObjects);
        $this->assertTrue(is_array($searchObject));
    }

    /**
     * @dataProvider proviceAPIs
     * @param AbstractAPI $api
     */
    public function testConvertCriteria(AbstractAPI $api)
    {
        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'name', 'value' => 'd')));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'd')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd'));
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd'), 'like');
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => 'like')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd', 'firstName' => 'b'));
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => '='), array('field' => 'name_2', 'value' => 'b', 'criteria' => '=')), $result);

    }

    /**
     * @dataProvider proviceAPIs
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

    protected function provideContactApi($name = 'gugüs')
    {
        $arguments = array();
        $arguments[] = new Contact($this->getMockConnection());
        $arguments[] = 'Ibrows\EasySysLibrary\Model\Contact';
        $model = new \Ibrows\EasySysLibrary\Model\Contact(null, 'first', null, null);
        $model->setLastName('last');
        $arguments[] = $model;
        $arguments[] = array(
            'name_1' => $name
        );
        $arguments[] = array(
            'name_1' => $name
        );
        return $arguments;
    }

    /**
     * @return array
     */
    public function provideAPIs()
    {
        $arrAll = array();
        $arrAll[] = $this->provideContactApi();
        $arrAll[] = $this->provideContactApi('schwurbbel..%&/ç*');


        return $arrAll;

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
} 