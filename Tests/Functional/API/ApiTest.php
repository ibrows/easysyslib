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

class ApiTest extends AbstractAPITest
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
        static::$listData[spl_object_hash($api)] = $all;
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
     * @return array
     */
    protected function provideContactApi()
    {
        $data = array(
            new Contact($this->getConnection())
        );
        return $data;
    }
}