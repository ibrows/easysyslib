<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Buzz\Browser;
use Buzz\Client\Curl;
use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\Connection\Connection;
use Ibrows\EasySysLibrary\Converter\ContactConverter;
use Saxulum\HttpClient\Buzz\HttpClient;
use Saxulum\HttpClient\HttpClientInterface;

class ApiContactTest extends ApiBase
{
    public function testList()
    {
        $api =$this->getApi();
        $all = $api->search(array(),null,3);
        $this->assertCount(3,$all);
        static::$listData = $all;
    }

    public function testSearchPerson(){
        $api =$this->getApi();
        $data = $this->getValidArray();
        $returnData = $api->searchForExistingPerson($data['mail']);
        $this->assertArrayHasKey(0,$returnData);
        $this->assertEquals($data,$returnData[0]);
        $returnData = $api->searchForExistingPerson($data['mail'],$data['firstName']);
        $this->assertArrayHasKey(0,$returnData);
        $this->assertEquals($data,$returnData[0]);
        $returnData = $api->searchForExistingPerson($data['mail'],$data['firstName'],$data['name'],$data['postcode'],$data['city']);
        $this->assertArrayHasKey(0,$returnData);
        $this->assertEquals($data,$returnData[0]);
    }


    public function testSearchCompany(){
        $api =$this->getApi();
        $data = $this->getValidArray();
        $data = $api->searchForExistingCompany($data['postcode'],$data['city'],$data['name']);
        $this->assertEquals($data,$data);
    }




}