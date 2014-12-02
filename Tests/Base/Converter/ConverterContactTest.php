<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Converter;

use Ibrows\EasySysLibrary\Converter\ContactConverter;
use Ibrows\EasySysLibrary\Model\Contact;

/**
 * Class ConverterTest
 * @package Ibrows\EasySysLibrary\Tests\Base
 */
class ConverterContactTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideContactArray
     * @param array $input
     */
    public function testContactConverter(array $input)
    {
        $converter = new ContactConverter();
        $converter->setSetNull(true);
        $converter->setArray($input);
        $return = $converter->getDataEasySys();
        $this->assertArrayHasKey('name_2', $return);

        if (array_key_exists('firstName', $input)) {
            $this->assertEquals($input['firstName'], $return['name_2']);
        } else {
            $this->assertNull($return['name_2']);
        }

        $converter->setDataEasySys($return);
        $output = $converter->getArray();
        $this->assertArrayHasKey('firstName', $output);
        if (array_key_exists('firstName', $input)) {
            $this->assertEquals($input['firstName'], $output['firstName']);
        } else {
            $this->assertNull($output['firstName']);
        }
    }

    public function testContactConverterObject()
    {
        $converter = new ContactConverter();
        $converter->setObject($this->getContactModel());
        $this->assertArrayHasKey('name_1', $converter->getDataEasySys());
    }

    /**
     * @return array
     */
    public function provideContactArray()
    {
        return array(
            array(array('firstName' => 'me')),
            array(array('firstName' => 'me', 'shizzle' => 'whizzle')),
            array(array()),
            array(array('firstName' => 'äüöü¨?!^^`sdf`%&Ç*"')),
        );
    }

    /**
     * @return Contact
     */
    protected function getContactModel()
    {
        $model = new Contact(null, 'last', null, null);
        $model->setFirstName('first');
        return $model;
    }

}
