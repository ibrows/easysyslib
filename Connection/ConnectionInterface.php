<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 11:38
 */

namespace Ibrows\EasySysBundle\Connection;

use Saxulum\HttpClient\HttpClientInterface;
use Saxulum\HttpClient\Request;

/**
 * Interface ConnectionInterface
 * @package Ibrows\EasySysBundle\Connection
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
     * @param null $order_by
     * @param bool $getRawData
     * @return array
     */
    public function call($resource, $urlParams = array(), $postParams = array(), $method = Request::METHOD_GET, $limit = 0, $offset = 0, $order_by = null, $getRawData = false);

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
}