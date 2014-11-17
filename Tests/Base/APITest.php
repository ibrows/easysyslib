<?php

namespace Ibrows\EasySysLibrary\Tests\Base;

use Ibrows\EasySysLibrary\API\Contact;

class APITest extends \PHPUnit_Framework_TestCase
{


    public function testContactAPI()
    {

        $api = $this->getContactApi();
        $this->assertMethod($api, 'call');
        $this->assertMethod($api, 'show');
        $this->assertMethod($api, 'search');
        $this->assertMethod($api, 'create');
        $this->assertMethod($api, 'update');
        $this->assertMethod($api, 'delete');



    }
    public function testConvertCriteria()
    {

        $api = $this->getContactApi();
        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(),$result);

        $result = $api->convertSimpleCriteria(array(array('field'=>'name', 'value'=>'d')));
        $this->assertEquals(array(array('field'=>'name', 'value'=>'d')),$result);

        $result = $api->convertSimpleCriteria(array('name'=> 'd'));
        $this->assertEquals(array(array('field'=>'name', 'value'=>'d','criteria' => '=')),$result);

        $result = $api->convertSimpleCriteria(array('name'=> 'd'),'like');
        $this->assertEquals(array(array('field'=>'name', 'value'=>'d','criteria' => 'like')),$result);

        $result = $api->convertSimpleCriteria(array('name'=> 'd', 'firstName'=>'b'));
        $this->assertEquals(array(array('field'=>'name', 'value'=>'d','criteria' => '='),array('field'=>'firstName', 'value'=>'b','criteria' => '=')),$result);

    }

    public function testContactShow()
    {
        $api = $this->getContactApi();
        $this->assertMethod($api, 'show');
        $contact = $api->showArray(1);
        $this->assertTrue(is_array($contact));
        $contact = $api->showObject(1);
        $this->assertTrue(is_object($contact));
        $this->assertContact($contact);
    }

    public function testContactSearch()
    {
        $api = $this->getContactApi();
        $this->assertMethod($api, 'search');
        $mock = $this->mockConnection();
        $mock->expects($this->exactly(3))
            ->method('call')
            ->will($this->returnValue(array(array())));
        $api->setConnection($mock);

        $contacts = $api->search(array('name' => 'gugus'));
        $this->assertTrue(is_array($contacts));
        $contacts = $api->searchObjects(array('name' => 'gugus'));
        $contact = current($contacts);
        $this->assertContact($contact);
        $contacts = $api->searchArrays(array('name' => 'gugus'));
        $contact = current($contacts);
        $this->assertTrue(is_array($contact));
    }


    public function testContactCreate()
    {
        $api = $this->getContactApi();
        $this->assertMethod($api, 'createFromObject');
        $contact = $api->createFromObject($this->getContactModel());
        $this->assertContact($contact);

        $this->assertMethod($api, 'createFromArray');
        $contact = $api->createFromArray(array('name' => 'gugus'));
        $this->assertTrue(is_array($contact));

    }

    public function testContactUpdate()
    {
        $api = $this->getContactApi();
        $mock = $this->mockConnection();
        $mock->expects($this->exactly(3))
            ->method('call')
            ->will($this->returnValue(array('name_1'=>'gugüs',)));
        $api->setConnection($mock);

        $this->assertMethod($api, 'update');
        $contact = $api->update(1,array('name_1'=>'gugüs'));
        $this->assertTrue(is_array($contact));
        $this->assertEquals(array('name_1'=>'gugüs'),$contact);

        $this->assertMethod($api, 'updateFromArray');
        $contact = $api->updateFromArray(1,array('name' => 'gugüs'));
        $this->assertTrue(is_array($contact));
        $this->assertEquals(array('name'=>'gugüs'),$contact);

        $model = new \Ibrows\EasySysLibrary\Model\Contact(null,'gugüs',null,null);
        $this->assertMethod($api, 'updateFromObject');
        $contact = $api->updateFromObject(1,$model);
        $this->assertContact( $contact);
        $this->assertEquals($model,$contact);

    }

    public function testContactDelete()
    {
        $api = $this->getContactApi();
        $this->assertMethod($api, 'delete');
        $mock = $this->mockConnection();
        $mock->expects($this->exactly(1))
            ->method('call')
            ->will($this->returnValue(array('success'=>true)));
        $api->setConnection($mock);


        $return = $api->delete(1);
        $this->assertTrue($return);

    }

    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
    }

    protected function getContactModel()
    {
        $model =  new \Ibrows\EasySysLibrary\Model\Contact(null, 'last', null, null);
        $model->setFirstName('first');
        return $model;
    }

    protected function getContactApi()
    {
        return new Contact($this->mockConnection());
    }

    protected function mockConnection()
    {

        $mock = $this->getMock('Ibrows\EasySysLibrary\Connection\ConnectionInterface');
        return $mock;
    }

    protected function assertMethod($object, $method)
    {
        $this->assertTrue(method_exists($object, $method), "method $method don't exists");
    }

    protected function assertContact($object)
    {
        $this->assertInstanceOf('Ibrows\EasySysLibrary\Model\Contact', $object);
    }

}
