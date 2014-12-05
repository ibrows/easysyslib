<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 13:11
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\API\AbstractAPI;
use Ibrows\EasySysLibrary\API\Contact;

class APITest extends AbstractAPITest
{
    /**
     * @var array
     */
    protected static $listData = array();

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     */
    public function testList(AbstractAPI $api)
    {
        $all = $api->search(array(), null, 3);
        $this->assertCount(3, $all);

        $name = $this->getApiName($api);
        static::$listData[$name] = $all;
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     */
    public function testShowMapping(AbstractAPI $api)
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
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param $aSearchField
     */
    public function testListArray(AbstractAPI $api, $aSearchField)
    {
        $all = $api->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey($aSearchField, $all[0]);
    }

    /**
     * @dataProvider provideAPIs
     * @param AbstractAPI $api
     * @param $aSearchField
     */
    public function testListObject(AbstractAPI $api, $aSearchField)
    {
        $all = $api->searchArrays(array(), null, 3);
        $this->assertCount(3, $all);
        $this->assertArrayHasKey($aSearchField, $all[0]);
    }

    /**
     * @return array
     */
    public function provideAPIs()
    {
        return array(
            $this->provideContactApi()
        );
    }

    /**
     * @param AbstractAPI $api
     * @throws \Exception
     * @return array
     */
    protected function getValidData(AbstractAPI $api)
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
            new Contact($this->getConnection()),
            'firstName'
        );
        return $data;
    }

    /**
     * @param AbstractAPI $api
     * @return string
     */
    protected function getApiName(AbstractAPI $api)
    {
        return get_class($api);
    }
}