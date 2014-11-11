<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Buzz\Browser;
use Buzz\Client\Curl;
use Ibrows\EasySysLibrary\API\Contact;
use Ibrows\EasySysLibrary\Connection\Connection;
use Saxulum\HttpClient\Buzz\HttpClient;
use Saxulum\HttpClient\HttpClientInterface;

/**
 * Created by PhpStorm.
 * Project: easysysbundle
 *
 * User: mikemeier
 * Date: 06.11.14
 * Time: 19:46
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!$this->getCredentials()) {
            $this->markTestSkipped(
                'The credentials.ini File is not available or wrong'
            );
        }
    }

    /**
     * @return array|null
     */
    protected function getCredentials()
    {
        $file = __DIR__ . '/credentials.ini';

        if (!file_exists($file)) {
            return null;
        }

        $credentials = parse_ini_file($file);

        foreach(array('company_name', 'api_key', 'signature_key', 'user_id') as $key){
            if(!isset($credentials[$key])){
                return null;
            }
        }

        return $credentials;
    }



    public function testList()
    {
        $api =$this->getApi();
        $all = $api->search(array(),null,3);
        $this->assertCount(3,$all);
    }

    public function testShow(){
        $api =$this->getApi();
        $all = $api->search(array(),null,1);
        $one = array_pop($all);
        $result = $api->show($one['id']);
        $this->assertEquals($one['name_1'],$result['name_1']);
        $this->assertEquals($one['name_2'],$result['name_2']);
    }

    protected function getApi(){
        return new Contact($this->getConnection());
    }

    protected function getConnection()
    {
        $credentials = $this->getCredentials();

        return new Connection(
            $this->getHttpClient(),
            $credentials['company_name'],
            $credentials['api_key'],
            $credentials['signature_key'],
            $credentials['user_id']
        );
    }

    /**
     * @return HttpClientInterface
     */
    protected function getHttpClient()
    {
        $client = new Curl();
        $client->setVerifyPeer(false);
        $browser = new Browser($client);
        return new HttpClient($browser);
    }
} 