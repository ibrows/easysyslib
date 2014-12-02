<?php

namespace Ibrows\EasySysLibrary\Tests\Base\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Contact;

class APIContactTest extends AbstractConcreteAPITest
{
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
