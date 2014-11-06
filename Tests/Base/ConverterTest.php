<?php

namespace Ibrows\EasySysLibrary\Tests\Base;

use Ibrows\EasySysLibrary\Converter\ContactConverter;

class ConverterTest extends \PHPUnit_Framework_TestCase
{


    public function testContactConverter()
    {
        $converter = new ContactConverter();
        $converter->setArray(array('firstName'=> 'me'));
        $this->assertArrayHasKey('name_1',$converter->getDataEasySys());

        $model = new \Ibrows\EasySysLibrary\Model\Contact('first','last',null,null,null,null,null,null);


    }
    public function testContactConverterObject()
    {
        $converter = new ContactConverter();
        $model = new \Ibrows\EasySysLibrary\Model\Contact('first','last',null,null,null,null,null,null);
        $converter->setObject($model);
        $this->assertArrayHasKey('name_1',$converter->getDataEasySys());




    }




}
