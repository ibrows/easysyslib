<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 12:29
 */

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\OrderApi;
use Ibrows\EasySysLibrary\Model\Order\Order;

class ApiOrderTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi
     */
    protected function getApi()
    {
        return new OrderApi($this->getMockConnection());
    }

    /**
     * Not possible to test in ApiTest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getApi();

        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'apiReference', 'value' => 'd')));
        $this->assertEquals(array(array('field' => 'apiReference', 'value' => 'd')), $result);

        $result = $api->convertSimpleCriteria(array('apiReference' => 'd'));
        $this->assertEquals(array(array('field' => 'api_reference', 'value' => 'd', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('apiReference' => 'd'), 'like');
        $this->assertEquals(array(array('field' => 'api_reference', 'value' => 'd', 'criteria' => 'like')), $result);
    }

    /**
     * @return object
     */
    protected function getModel()
    {
        $model = new Order(null, null);
        $model->setTitle('Test-Order');
        return $model;
    }
}