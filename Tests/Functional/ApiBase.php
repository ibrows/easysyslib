<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\Converter\ContactConverter;

abstract class ApiBase extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!$this->getConnection()) {
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
    }

    protected static $listData;

    public function testList()
    {
        $api = $this->getApi();
        $all = $api->search(array(), null, 3);
        $this->assertCount(3, $all);
        static::$listData = $all;
    }

    public function testListArray()
    {
        $all = $this->getApi()->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey('firstName', $all[0]);

    }

    public function testListObject()
    {
        $all = $this->getApi()->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey('firstName', $all[0]);

    }

    /**
     * @return array
     */
    protected function getValidData()
    {
        return static::$listData[0];
    }

    /**
     * @return \Ibrows\EasySysLibrary\Model\Contact
     */
    protected function getValidObject()
    {

        return $this->getConverter()->convertEasySysToObject(static::$listData[0]);
    }

    /**
     * @return array
     */
    protected function getValidArray()
    {
        return $this->getConverter()->convertEasySysToArray(static::$listData[0]);
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

    public function testShowMapping()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $resultReal = $api->show($data['id']);
        $this->assertTrue(is_array($resultReal));

        $resultMapped = $api->showArray($data['id']);
        if (array_key_exists('addiationalData', $resultMapped)) {
            echo "unmapped EasySys values \n";
            foreach ($resultMapped['additionalData'] as $key => $value) {
                $type = gettype($value);
                echo "'$key' => '$key', // $type \n";
            }
        }
        $this->assertCount(count($resultReal), $resultMapped, "not all EasySys values are mapped");

    }

    public function testSearch()
    {
        $api = $this->getApi();
        $data = $this->getValidData();
        $result = $api->search(array('name_1' => $data['name_1'],'mail'=>$data['mail'] ));
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
        $result = $api->searchArrays(array('name' => $data['name'],'mail'=>$data['mail'] ));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name'], $result['name']);
        $this->assertEquals($data['firstName'], $result['firstName']);
        $this->assertEquals($data['mail'], $result['mail']);
    }

    public function testSearchObject()
    {
        $api = $this->getApi();
        $data = $this->getValidObject();
        $result = $api->searchObjects(array('name' => $data->getName(),'mail'=>$data->getMail() ));
        $this->assertTrue(is_array($result));
        $result = array_shift($result);
        $this->assertModel($result);
        $this->assertEquals($data, $result);
    }

    protected function getConverter()
    {
        return $converter = new ContactConverter();
    }

    protected function getApi()
    {
        return new Contact($this->getConnection());
    }

    protected function getConnection()
    {
        return ConnectionTest::getConnection();
    }

    protected function assertModel($object)
    {
        $this->assertInstanceOf('Ibrows\EasySysLibrary\Model\Contact', $object);
    }
}