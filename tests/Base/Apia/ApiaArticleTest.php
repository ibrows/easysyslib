<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\Article;
use Ibrows\EasySysLibrary\Model\Article as ArticleModel;

class ApiArticleTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi
     */
    protected function getApi()
    {
        return new Article($this->getMockConnection());
    }

    /**
     * Not possible to test in ApiTest with provider data
     */
    public function testConvertCriteria()
    {
        $api = $this->getApi();

        $result = $api->convertSimpleCriteria(array());
        $this->assertEquals(array(), $result);

        $result = $api->convertSimpleCriteria(array(array('field' => 'internName', 'value' => 'test')));
        $this->assertEquals(array(array('field' => 'internName', 'value' => 'test')), $result);

        $result = $api->convertSimpleCriteria(array('internName' => 'test'));
        $this->assertEquals(array(array('field' => 'intern_name', 'value' => 'test', 'criteria' => '=')), $result);

        $result = $api->convertSimpleCriteria(array('internName' => 'test'), 'like');
        $this->assertEquals(array(array('field' => 'intern_name', 'value' => 'test', 'criteria' => 'like')), $result);
    }

    /**
     * @return object
     */
    protected function getModel()
    {
        $model = new ArticleModel();
        $model->setInternName('test');

        return $model;
    }
}