<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Buzz\Browser;
use Buzz\Client\Curl;
use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\Connection\Connection;
use Saxulum\HttpClient\Buzz\HttpClient;
use Saxulum\HttpClient\HttpClientInterface;

/**
 * Created by PhpStorm.
 * Project: easysysbundle
 *
 * User: mikemeier
 * Date: 06.11.14
 * Time: 19:46
 */
class ApiTest extends \PHPUnit_Framework_TestCase
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
        $api =$this->getApi();
        $all = $api->search(array(),null,3);
        $this->assertCount(3,$all);
        self::$listData = $all;
    }
    public function testListArray()
    {
        $all = $this->getApi()->searchArrays(array(),null,3);
        $this->assertCount(3,$all);
        $this->assertArrayHasKey('firstName',$all[0]);

    }
    public function testListObject()
    {
        $all = $this->getApi()->searchArrays(array(),null,3);
        $this->assertCount(3,$all);
        $this->assertArrayHasKey('firstName',$all[0]);

    }

    protected function getValidData(){
        return self::$listData[0];
    }



    public function testShow(){
        $api =$this->getApi();
        $data = $this->getValidData();
        $result = $api->show($data['id']);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'],$result['name_1']);
        $this->assertEquals($data['name_2'],$result['name_2']);

        $result = $api->showArray($data['id']);
        $this->assertTrue(is_array($result));
        $this->assertEquals($data['name_1'],$result['name']);
        $this->assertEquals($data['name_2'],$result['firstName']);

        $result = $api->showObject($data['id']);
        $this->assertTrue(is_object($result));
        $this->assertEquals($data['name_1'],$result->getLastName());
        $this->assertEquals($data['name_2'],$result->getFirstName());

    }

    public function testShowMapping(){
        $api =$this->getApi();
        $data = $this->getValidData();
        $resultReal = $api->show($data['id']);
        $this->assertTrue(is_array($resultReal));

        $resultMapped = $api->showArray($data['id']);
        if(array_key_exists('addiationalData',$resultMapped)){
            echo "unmapped EasySys values \n";
            foreach ($resultMapped['additionalData'] as $key => $value) {
                $type = gettype($value);
                echo "'$key' => '$key', // $type \n";
            }
        }
        $this->assertCount(count($resultReal),$resultMapped, "not all EasySys values are mapped");

    }

    protected function getApi(){
        return new Contact($this->getConnection());
    }

    protected function getConnection()
    {
        return ConnectionTest::getConnection();
    }


}