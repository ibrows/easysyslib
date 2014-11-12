<?php

namespace Ibrows\EasySysLibrary\Tests\Functional;

use Buzz\Browser;
use Buzz\Client\Curl;
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
class ConnectionTest extends \PHPUnit_Framework_TestCase
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
    protected  static function getCredentials()
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

    public function testListContacts()
    {
        $connection = $this->getConnection();
        $this->assertInternalType('array', $connection->call('/contact'));
    }

    public static function getConnection()
    {
        $credentials = self::getCredentials();
        if($credentials == null){
            return null;
        }
        return new Connection(
            self::getHttpClient(),
            $credentials['company_name'],
            $credentials['api_key'],
            $credentials['signature_key'],
            $credentials['user_id']
        );
    }

    /**
     * @return HttpClientInterface
     */
    protected  static  function getHttpClient()
    {
        $client = new Curl();
        $client->setVerifyPeer(false);
        $browser = new Browser($client);
        return new HttpClient($browser);
    }
} 