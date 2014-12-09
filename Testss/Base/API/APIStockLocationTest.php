<?php

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\StockLocation;
use Ibrows\EasySysLibrary\Model\StockLocation as StockLocationModel;

class APIStockLocationTest extends AbstractConcreteAPITest
{
    /**
     * @return AbstractAPI
     */
    protected function getAPI()
    {
        return new StockLocation($this->getMockConnection());
    }

    /**
     * Not possible to test in APITest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getAPI();

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
        $model = new StockLocationModel();
        $model->setName('test');

        return $model;
    }
}