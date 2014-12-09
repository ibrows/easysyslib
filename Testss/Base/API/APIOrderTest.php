<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.12.14
 * Time: 12:29
 */

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Order;

class APIOrderTest extends AbstractConcreteAPITest
{
    /**
     * @return AbstractAPI
     */
    protected function getAPI()
    {
        return new Order($this->getMockConnection());
    }

    /**
     * Not possible to test in APITest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getAPI();

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
        $model = new \Ibrows\EasySysLibrary\Model\Order(null, null);
        $model->setTitle('Test-Order');
        return $model;
    }
}