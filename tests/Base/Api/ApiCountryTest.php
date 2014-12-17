<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\CountryApi;
use Ibrows\EasySysLibrary\Model\Other\Country;

class ApiCountryTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi|CountryApi
     */
    protected function getApi()
    {
        return new CountryApi($this->getMockConnection());
    }

    /**
     * Not possible to test in ApiTest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getApi();

        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'name', 'value' => 'Kiribati')));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'Kiribati')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'Kiribati'));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'Kiribati', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'Kiribati'), 'like');
        $this->assertEquals(array(array('field' => 'name', 'value' => 'Kiribati', 'criteria' => 'like')), $result);
    }

    /**
     * @return Country
     */
    protected function getModel()
    {
        $model = new Country('Kiribati', 'KI', 'KI');
        return $model;
    }
}