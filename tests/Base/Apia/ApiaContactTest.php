<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\Contact;

class ApiContactTest extends AbstractConcreteApiTest
{
    public function testDescription()
    {
        $this->assertSame('Kontaktperson', $this->getApi()->getDescription());
    }

    public function testConvertCriteria()
    {
        $api = $this->getApi();

        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'name', 'value' => 'd')));
        $this->assertEquals(array(array('field' => 'name', 'value' => 'd')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd'));
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd'), 'like');
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => 'like')), $result);

        $result = $api->convertSimpleCriteria(array('name' => 'd', 'firstName' => 'b'));
        $this->assertEquals(array(array('field' => 'name_1', 'value' => 'd', 'criteria' => '='), array('field' => 'name_2', 'value' => 'b', 'criteria' => '=')), $result);
    }

    /**
     * @return AbstractApi|Contact
     */
    protected function getApi()
    {
        return new Contact($this->getMockConnection());
    }

    /**
     * @return object|\Ibrows\EasySysLibrary\Model\Contact
     */
    protected function getModel()
    {
        $model = new \Ibrows\EasySysLibrary\Model\Contact(null, 'last', null, null);
        $model->setFirstName('first');
        return $model;
    }
}
