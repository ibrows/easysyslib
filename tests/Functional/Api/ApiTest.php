<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:11
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\AbstractApi;
use Ibrows\EasySysLibrary\Api\ArticleApi;
use Ibrows\EasySysLibrary\Api\ContactApi;
use Ibrows\EasySysLibrary\Api\TaxApi;

class ApiTest extends AbstractApiTest
{
    /**
     * @var array
     */
    protected static $listData = array();

    /**
     * @dataProvider provideApis
     * @param AbstractApi $api
     */
    public function testList(AbstractApi $api)
    {
        $all = $api->search(array(), null, 3);
        $this->assertCount(3, $all);

        $name = $this->getApiName($api);
        static::$listData[$name] = $all;
    }

    /**
     * @dataProvider provideApis
     * @param AbstractApi $api
     */
    public function testShowMapping(AbstractApi $api)
    {
        $data = $this->getValidData($api);
        $resultReal = $api->show($data['id']);
        $this->assertTrue(is_array($resultReal));

        $resultMapped = $api->showArray($data['id']);
        if (array_key_exists('addiationalData', $resultMapped)) {
            echo "unmapped EasySys values \n";
            foreach ($resultMapped['additionalData'] as $key => $value) {
                $type = gettype($value);
                echo "'$key' => '$key', // $type \n";
            }
        }

        $this->assertCount(count($resultReal), $resultMapped, "not all EasySys values are mapped");
    }

    /**
     * @dataProvider provideApis
     * @param AbstractApi $api
     * @param $aSearchField
     */
    public function testListArray(AbstractApi $api, $aSearchField)
    {
        $all = $api->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey($aSearchField, $all[0]);
    }

    /**
     * @dataProvider provideApis
     * @param AbstractApi $api
     * @param $aSearchField
     */
    public function testListObject(AbstractApi $api, $aSearchField)
    {
        $all = $api->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey($aSearchField, $all[0]);
    }

    /**
     * @return array
     */
    public function provideApis()
    {
        return array(
            $this->provideContactApi(),
            $this->provideArticleApi(),
            $this->provideTaxApi()
        );
    }

    /**
     * @param AbstractApi $api
     * @throws \Exception
     * @return array
     */
    protected function getValidData(AbstractApi $api)
    {
        $name = $this->getApiName($api);
        if (!isset(static::$listData[$name][0])) {
            throw new \Exception("Call list first to setup listData");
        }
        return static::$listData[$name][0];
    }

    /**
     * @return array
     */
    protected function provideContactApi()
    {
        $data = array(
            new ContactApi($this->getConnection()),
            'firstName'
        );
        return $data;
    }

    /**
     * @return array
     */
    protected function provideTaxApi()
    {
        $data = array(
            new TaxApi($this->getConnection()),
            'value'
        );
        return $data;
    }

    /**
     * @return array
     */
    protected function provideArticleApi()
    {
        $data = array(
            new ArticleApi($this->getConnection()),
            'internName'
        );
        return $data;
    }

    /**
     * @param AbstractApi $api
     * @return string
     */
    protected function getApiName(AbstractApi $api)
    {
        return get_class($api);
    }
}