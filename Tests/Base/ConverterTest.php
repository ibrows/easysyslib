<?php

namespace Ibrows\EasySysLibrary\Tests\Base;

use Ibrows\EasySysLibrary\Converter\ContactConverter;

class ConverterTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider provideContactArray
     */
    public function testContactConverter(array $input)
    {
        $converter = new ContactConverter();
        $converter->setArray($input);
        $return = $converter->getDataEasySys();
        $this->assertArrayHasKey('name_1', $return);
        if (array_key_exists('firstName', $input)) {
            $this->assertEquals($input['firstName'], $return['name_1']);
        }else{
            $this->assertNull( $return['name_1']);
        }

        $converter->setDataEasySys($return);
        $output = $converter->getArray();
        $this->assertArrayHasKey('firstName', $output);
        if (array_key_exists('firstName', $input)) {
            $this->assertEquals($input['firstName'], $output['firstName']);
        }else{
            $this->assertNull( $output['firstName']);
        }



    }

    public function testContactConverterObject()
    {
        $converter = new ContactConverter();
        $model = new \Ibrows\EasySysLibrary\Model\Contact('first', 'last', null, null, null, null, null, null);
        $converter->setObject($model);
        $this->assertArrayHasKey('name_1', $converter->getDataEasySys());


    }


    public function provideContactArray()
    {
        return array(
            array(array('firstName' => 'me')),
            array(array('firstName' => 'me', 'shizzle' => 'whizzle')),
            array(array()),
        );
    }

}
