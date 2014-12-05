<?php

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Contact;

class APIContactTest extends AbstractConcreteAPITest
{
    public function testDescription()
    {
        $this->assertSame('Kontaktperson', $this->getAPI()->getDescription());
    }

    public function testConvertCriteria()
    {
        $api = $this->getAPI();

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
     * @return AbstractAPI|Contact
     */
    protected function getAPI()
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
