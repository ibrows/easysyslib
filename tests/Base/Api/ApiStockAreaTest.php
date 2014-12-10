<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\StockArea;
use Ibrows\EasySysLibrary\Model\StockArea as StockAreaModel;

class ApiStockAreaTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi
     */
    protected function getApi()
    {
        return new StockArea($this->getMockConnection());
    }

    /**
     * Not possible to test in ApiTest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getApi();

        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'name', 'value' => 'test')));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'test')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'test'));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'test', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'test'), 'like');
        $this->assertEquals(array(array('field' => 'name', 'value' => 'test', 'criteria' => 'like')), $result);
    }

    /**
     * @return object
     */
    protected function getModel()
    {
        $model = new StockAreaModel();
        $model->setName('test');

        return $model;
    }
}