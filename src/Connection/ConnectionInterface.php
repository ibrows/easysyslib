<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 11:38
 */

namespace Ibrows\EasySysLibrary\Connection;

use Psr\Log\LoggerInterface;
use Saxulum\HttpClient\HttpClientInterface;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

/**
 * Interface ConnectionInterface
 * @package Ibrows\EasySysLibrary\Connection
 */
interface ConnectionInterface
{
    /**
     * @param string $resource
     * @param array $urlParams
     * @param array $postParams
     * @param string $method
     * @param int $limit
     * @param int $offset
     * @param null $orderBy
     * @return array
     */
    public function call($resource, $urlParams = array(), $postParams = array(), $method = Request::METHOD_GET, $limit = 0, $offset = 0, $orderBy = null);

    /**
     * @return Response
     */
    public function getLastResponse();

    /**
     * @return Request
     */
    public function getLastRequest();

    /**
     * @param HttpClientInterface $httpClient
     */
    public function setHttpClient(HttpClientInterface $httpClient);

    /**
     * @param string $serviceUri
     */
    public function setServiceUri($serviceUri);

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName);

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey);

    /**
     * @param string $signatureKey
     */
    public function setSignatureKey($signatureKey);

    /**
     * @param int $userId
     */
    public function setUserId($userId);

    /**
     * @return int
     */
    public function getUserId();

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger = null);
}