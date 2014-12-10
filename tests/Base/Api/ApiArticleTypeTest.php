<?php

namespace Ibrows\EasySysLibrary\Tests\Base\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\ArticleTypeApi;
use Ibrows\EasySysLibrary\Model\Article\ArticleType;

class ApiArticleTypeTest extends AbstractConcreteApiTest
{
    /**
     * @return AbstractApi|ArticleTypeApi
     */
    protected function getApi()
    {
        return new ArticleTypeApi($this->getMockConnection());
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
     * @return ArticleType
     */
    protected function getModel()
    {
        $model = new ArticleType();
        $model->setName('test');
        return $model;
    }
}