<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\InvoiceApi;
use Ibrows\EasySysLibrary\Model\Invoice\Invoice;

class ApiInvoiceTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi|InvoiceApi
     */
    protected function getApi()
    {
        return new InvoiceApi($this->getMockConnection());
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
        $model = new Invoice();
        $model->setApiReference('api-ref');
        return $model;
    }
}