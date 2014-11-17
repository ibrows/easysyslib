<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\Converter\ContactConverter;

abstract class ApiBase extends \PHPUnit_Framework_TestCase
{
    protected static $listData;

    protected function setUp()
    {
        if (!$this->getConnection()) {
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
    }


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
        $result = $api->search(array('name_1' => $data['name_1'], 'mail' => $data['mail']));
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

    public function delete($id)
    {
        $api = $this->getApi();
        $result = $api->delete($id);
        $this->assertTrue($result);
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


    public function testCreateObject()
    {
        $api = $this->getApi();
        $object = new \Ibrows\EasySysLibrary\Model\Contact($api->getTypeIdPrivate(),'testabc',$api->getConnection()->getUserId(),$api->getConnection()->getUserId());
        $result = $api->createFromObject($object);
        $this->assertModel($object);
        $this->assertEquals('testabc', $result->getName());
        $this->updateObject($result);
    }

    public function updateObject($object)
    {
        $api = $this->getApi();
        $object->setName('testupdateabc');
        $object->setMail('testupdate@abc.ch');
        $result = $api->updateFromObject($object->getId(),$object);
        $this->assertModel($object);
        $this->assertEquals($object->getName(), $result->getName());
        $this->assertEquals($object->getMail(), $result->getMail());
        $this->assertGreaterThan($object->getUpdatedAt(), $result->getUpdatedAt());
        $this->delete($result->getId());
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