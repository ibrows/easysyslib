<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\ArticleApi;
use Ibrows\EasySysLibrary\Model\Article\Article;

class ApiArticleTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi|ArticleApi
     */
    protected function getApi()
    {
        return new ArticleApi($this->getMockConnection());
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
     * @return Article
     */
    protected function getModel()
    {
        $model = new Article();
        $model->setInternName('test');
        return $model;
    }
}